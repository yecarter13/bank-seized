@extends('layouts.master')

@section('title', 'Checkout — Bank Seized Cars for Sale')

@section('content')

<section class="bg-automotive-900 py-12 lg:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-4 mb-4">
            <div class="w-12 h-12 bg-safety/20 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-safety" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            </div>
            <div>
                <h1 class="text-3xl lg:text-4xl font-bold text-white">WhatsApp Order</h1>
                <p class="text-automotive-300 text-sm mt-1">Complete your order via WhatsApp — no online payment</p>
            </div>
        </div>
    </div>
</section>

{{-- Trust Banner --}}
<div class="bg-green-500 py-3">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-center gap-6 text-white text-sm flex-wrap">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                <span class="font-medium">Order via WhatsApp</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                <span class="font-medium">No Online Payment Required</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                <span class="font-medium">Direct Communication with Seller</span>
            </div>
        </div>
    </div>
</div>

<section class="py-10 lg:py-14 bg-automotive-50 min-h-[50vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-5 lg:gap-8">

            {{-- WhatsApp Order --}}
            <div class="lg:col-span-3">
                <div class="bg-white rounded-2xl border border-automotive-100 p-6 lg:p-8">
                    <h2 class="text-xl font-bold text-automotive-900 mb-6">Complete Your Order via WhatsApp</h2>

                    <div class="space-y-4 mb-6">
                        <p class="text-automotive-500">Review your cart items below, then tap the WhatsApp button to send your order directly to our team. No online payment is required.</p>
                        <p class="text-sm text-automotive-400">You can add any special instructions or questions in the WhatsApp message.</p>
                    </div>

                    @php
                    $waItems = [];
                    foreach ($cart as $item) {
                        $waItems[] = $item['name'] . ' x' . $item['quantity'] . ' - $' . number_format($item['price'] * $item['quantity'], 2);
                    }
                    $waMessage = "Hi, I'd like to place an order:\n\n" . implode("\n", $waItems) . "\n\nTotal: $" . number_format($total, 2) . "\n\nPlease confirm availability and delivery details.";
                    $waUrl = 'https://wa.me/' . (env('WHATSAPP_NUMBER', '1234567890')) . '?text=' . urlencode($waMessage);
                    @endphp

                    <a href="{{ $waUrl }}" target="_blank" rel="noopener" class="w-full px-6 py-4 bg-green-500 hover:bg-green-600 text-white font-bold rounded-xl transition-all duration-300 shadow-lg shadow-green-500/25 flex items-center justify-center gap-3 text-lg">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Complete Order via WhatsApp
                    </a>

                    <p class="text-xs text-automotive-400 text-center mt-4">No online payment — your order will be confirmed directly on WhatsApp.</p>
                </div>
            </div>

            {{-- Order Summary --}}
            <div class="lg:col-span-2 mt-8 lg:mt-0">
                <div class="bg-white rounded-2xl border border-automotive-100 p-6 lg:p-8 sticky top-28">
                    <h3 class="font-bold text-automotive-900 mb-4">Order Summary</h3>

                    <div class="space-y-3 mb-6">
                        @foreach($cart as $id => $item)
                        <div class="flex items-center gap-3 pb-3 border-b border-automotive-50">
                            <div class="w-14 h-14 bg-automotive-50 rounded-xl overflow-hidden flex-shrink-0">
                                <img src="{{ $item['image'] ?? 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?w=200&q=80' }}" alt="" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-automotive-900 line-clamp-1">{{ $item['name'] }}</p>
                                <p class="text-xs text-automotive-400">Qty: {{ $item['quantity'] }}</p>
                            </div>
                            <p class="text-sm font-semibold text-automotive-900">${{ number_format($item['price'] * $item['quantity'], 2) }}</p>
                        </div>
                        @endforeach
                    </div>

                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between text-automotive-500">
                            <span>Subtotal</span>
                            <span>${{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-automotive-500">
                            <span>Shipping</span>
                            <span>@if($freeShipping)<span class="text-green-600 font-semibold">FREE</span>@else${{ number_format($shipping, 2) }}@endif</span>
                        </div>
                        @if($freeShipping && $isFirstOrder)
                        <div class="bg-green-50 border border-green-200 rounded-lg p-2.5 flex items-center gap-2">
                            <svg class="w-4 h-4 text-green-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            <span class="text-xs text-green-700 font-medium">First order — FREE shipping applied</span>
                        </div>
                        @elseif(!$freeShipping)
                        <div class="bg-automotive-50 rounded-lg p-3">
                            <div class="flex items-center justify-between mb-1.5">
                                <span class="text-xs text-automotive-500">Free shipping on orders over $75</span>
                                <span class="text-xs font-medium text-automotive-700">${{ number_format(max(0, 75 - $subtotal), 2) }} away</span>
                            </div>
                            <div class="w-full h-1.5 bg-automotive-200 rounded-full overflow-hidden">
                                <div class="h-full bg-safety rounded-full transition-all" style="width: {{ min(100, ($subtotal / 75) * 100) }}%"></div>
                            </div>
                        </div>
                        @endif
                        <div class="border-t border-automotive-100 pt-3 flex justify-between font-bold text-automotive-900">
                            <span>Total <span class="font-normal text-automotive-400 text-xs">(incl. shipping)</span></span>
                            <span class="text-xl">${{ number_format($total, 2) }}</span>
                        </div>
                    </div>

                    <div class="mt-6 pt-4 border-t border-automotive-100">
                        <p class="text-xs text-automotive-400 flex items-center gap-2 mb-2">
                            <svg class="w-3.5 h-3.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            Order will be confirmed via WhatsApp — no card details needed
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@push('scripts')
@endpush

@endsection
