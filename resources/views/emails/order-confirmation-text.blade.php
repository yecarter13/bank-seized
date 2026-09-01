Bank Seized Cars - Order Confirmation

Dear {{ $order->customer_name }},

Thank you for your order. It has been placed successfully and we are now processing it.

Order Reference: #{{ $order->order_number }}

Items Ordered:
@foreach($order->items as $item)
- {{ $item->product_name }} x{{ $item->quantity }} - £{{ number_format($item->price,2) }} (Total: £{{ number_format($item->total,2) }})
@endforeach

Subtotal: £{{ number_format($order->subtotal,2) }}
Shipping: 
@if($order->shipping > 0)
£{{ number_format($order->shipping,2) }}
@else
Free
@endif
Order Total: £{{ number_format($order->total,2) }}

Shipping Address:
{{ $order->shipping_address }}
{{ $order->shipping_city }} {{ $order->shipping_postcode }}
@if($order->customer_phone)
Tel: {{ $order->customer_phone }}
@endif

If you have any questions, contact us at:
support@auto-part-uk.service-etranger.fr

(c) {{ date('Y') }} Bank Seized Cars. All rights reserved.
auto-part-uk.service-etranger.fr

This email was sent to confirm your order on Bank Seized Cars.