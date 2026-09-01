<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;
use App\Support\OrderMode;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function cart(CartService $cart)
    {
        return view('checkout.cart', [
            'cart' => $cart->get(),
            'subtotal' => $cart->subtotal(),
            'total' => $cart->total(),
            'count' => $cart->count(),
        ]);
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:0',
        ]);

        $cart = app(CartService::class);

        if ($cart->get()->has($request->product_id)) {
            $cart->update($request->product_id, $request->quantity);
        } else {
            $cart->add($request->product_id, max(1, $request->quantity));
        }

        return response()->json([
            'count' => $cart->count(),
            'message' => 'Cart updated',
        ]);
    }

    public function removeFromCart(Request $request, $id)
    {
        $cart = app(CartService::class);
        $cart->remove((int) $id);
        return redirect()->route('cart');
    }

    public function clearCart()
    {
        $cart = app(CartService::class);
        $cart->clear();
        return redirect()->route('cart');
    }

    public function buyNow(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $qty = max(1, (int) $request->quantity);

        $link = OrderMode::waLink(OrderMode::productMessage($product, $qty));
        return $link
            ? redirect()->away($link)
            : redirect()->route('product.show', $product->slug)->with('error', 'WhatsApp is not configured. Please contact us directly.');
    }

    public function orderViaWhatsApp(CartService $cart)
    {
        $items = $cart->get();
        if ($items->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $total = $cart->total();
        $link = OrderMode::waLink(OrderMode::cartMessage($items->toArray(), $total));
        
        $cart->clear();

        return $link
            ? redirect()->away($link)
            : redirect()->route('home')->with('error', 'WhatsApp is not configured. Please contact us directly.');
    }
}
