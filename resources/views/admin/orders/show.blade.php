@extends('admin.layouts.master')

@section('title', 'Order ' . $order->order_number)

@section('content')
<div class="max-w-4xl">
    <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center gap-1.5 text-sm text-automotive-500 hover:text-automotive-700 mb-4 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Back to Orders
    </a>

    <div class="bg-white rounded-xl border border-automotive-100 p-6 lg:p-8 space-y-8">
        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-automotive-900">Order #{{ $order->order_number }}</h1>
                <p class="text-sm text-automotive-400 mt-1">Placed on {{ $order->created_at->format('l, jS F Y \a\t H:i') }}</p>
            </div>
            @php
                $statusClass = match($order->status) {
                    'paid' => 'bg-green-100 text-green-700 border-green-200',
                    'pending' => 'bg-amber-100 text-amber-700 border-amber-200',
                    'cancelled' => 'bg-red-100 text-red-700 border-red-200',
                    default => 'bg-automotive-100 text-automotive-600',
                };
            @endphp
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-medium rounded-full border {{ $statusClass }}">
                @switch($order->status)
                    @case('paid')
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    @break
                    @case('pending')
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    @break
                    @case('cancelled')
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    @break
                @endswitch
                {{ ucfirst($order->status) }}
            </span>
            @if($order->status === 'pending')
            <form method="POST" action="{{ route('admin.orders.markPaid', $order->id) }}" onsubmit="return confirm('Mark this order as paid?')">
                @csrf
                <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors">Mark as Paid</button>
            </form>
            @endif
        </div>

        {{-- Items --}}
        <div>
            <h3 class="font-bold text-automotive-900 mb-4">Order Items</h3>
            <div class="space-y-3">
                @foreach($order->items as $item)
                <div class="flex items-center justify-between p-4 bg-automotive-50 rounded-xl">
                    <div>
                        <p class="font-medium text-automotive-900">{{ $item->product_name }}</p>
                        <p class="text-sm text-automotive-400">${{ number_format($item->price, 2) }} &times; {{ $item->quantity }}</p>
                    </div>
                    <p class="font-semibold text-automotive-900">${{ number_format($item->total, 2) }}</p>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Totals --}}
        <div class="border-t border-automotive-100 pt-4 space-y-2 text-sm max-w-xs ml-auto">
            <div class="flex justify-between text-automotive-500">
                <span>Subtotal</span>
                <span>${{ number_format($order->subtotal, 2) }}</span>
            </div>
            <div class="flex justify-between text-automotive-500">
                <span>Shipping</span>
                <span>{{ $order->shipping > 0 ? '$' . number_format($order->shipping, 2) : 'FREE' }}</span>
            </div>
            <div class="flex justify-between font-bold text-automotive-900 text-base pt-2 border-t border-automotive-100">
                <span>Total</span>
                <span>${{ number_format($order->total, 2) }}</span>
            </div>
        </div>

        {{-- Customer Details --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 border-t border-automotive-100 pt-6">
            <div>
                <h4 class="font-semibold text-automotive-900 mb-2 text-sm uppercase tracking-wider">Shipping Address</h4>
                <div class="text-sm text-automotive-500 space-y-1">
                    <p>{{ $order->customer_name }}</p>
                    <p>{{ $order->shipping_address }}</p>
                    <p>{{ $order->shipping_city }}</p>
                    <p>{{ $order->shipping_postcode }}</p>
                </div>
            </div>
            <div>
                <h4 class="font-semibold text-automotive-900 mb-2 text-sm uppercase tracking-wider">Contact</h4>
                <div class="text-sm text-automotive-500 space-y-1">
                    <p>{{ $order->customer_email }}</p>
                    <p>{{ $order->customer_phone ?? 'No phone' }}</p>
                </div>
                @if($order->notes)
                <div class="mt-4">
                    <h4 class="font-semibold text-automotive-900 mb-2 text-sm uppercase tracking-wider">Notes</h4>
                    <p class="text-sm text-automotive-500">{{ $order->notes }}</p>
                </div>
                @endif
            </div>
        </div>

        {{-- Stripe Info --}}
        @if($order->stripe_session_id)
        <div class="border-t border-automotive-100 pt-6">
            <h4 class="font-semibold text-automotive-900 mb-2 text-sm uppercase tracking-wider">Payment</h4>
            <div class="text-sm text-automotive-500 space-y-1">
                <p>Session: <span class="font-mono text-xs">{{ $order->stripe_session_id }}</span></p>
                @if($order->stripe_payment_intent)
                <p>Payment Intent: <span class="font-mono text-xs">{{ $order->stripe_payment_intent }}</span></p>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
