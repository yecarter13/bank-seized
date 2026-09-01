@php
    $statusIcon = fn($s) => match($s) {
        'paid' => '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
        'pending' => '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
        'cancelled' => '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
        default => '',
    };
    $statusClass = fn($s) => match($s) {
        'paid' => 'bg-green-100 text-green-700 border-green-200',
        'pending' => 'bg-amber-100 text-amber-700 border-amber-200',
        'cancelled' => 'bg-red-100 text-red-700 border-red-200',
        default => 'bg-automotive-100 text-automotive-600',
    };
@endphp

@extends('admin.layouts.master')

@section('title', 'Orders — Admin')

@section('content')
<div class="space-y-6">

    {{-- Stats Cards --}}
    <div class="grid grid-cols-2 lg:grid-cols-5 gap-4">
        <div class="bg-white rounded-xl border border-automotive-100 p-4">
            <p class="text-xs text-automotive-400 uppercase tracking-wider mb-1">Total Orders</p>
            <p class="text-2xl font-bold text-automotive-900">{{ $stats['total'] }}</p>
        </div>
        <div class="bg-white rounded-xl border border-green-100 p-4">
            <p class="text-xs text-green-600 uppercase tracking-wider mb-1 flex items-center gap-1">{!! $statusIcon('paid') !!} Paid</p>
            <p class="text-2xl font-bold text-green-700">{{ $stats['paid'] }}</p>
        </div>
        <div class="bg-white rounded-xl border border-amber-100 p-4">
            <p class="text-xs text-amber-600 uppercase tracking-wider mb-1 flex items-center gap-1">{!! $statusIcon('pending') !!} Pending</p>
            <p class="text-2xl font-bold text-amber-700">{{ $stats['pending'] }}</p>
        </div>
        <div class="bg-white rounded-xl border border-red-100 p-4">
            <p class="text-xs text-red-600 uppercase tracking-wider mb-1 flex items-center gap-1">{!! $statusIcon('cancelled') !!} Cancelled</p>
            <p class="text-2xl font-bold text-red-700">{{ $stats['cancelled'] }}</p>
        </div>
        <div class="bg-white rounded-xl border border-automotive-100 p-4">
            <p class="text-xs text-automotive-400 uppercase tracking-wider mb-1">Revenue (paid)</p>
            <p class="text-2xl font-bold text-automotive-900">${{ number_format($stats['revenue'], 2) }}</p>
        </div>
    </div>

    {{-- Filters --}}
    <div class="bg-white rounded-xl border border-automotive-100 p-4">
        <form method="GET" class="flex flex-wrap items-end gap-3">
            <div>
                <label class="block text-xs text-automotive-500 mb-1 font-medium">Status</label>
                <select name="status" class="px-3 py-2 border border-automotive-200 rounded-lg text-sm focus:outline-none focus:border-safety">
                    <option value="">All</option>
                    <option value="paid" @selected(request('status') === 'paid')>Paid</option>
                    <option value="pending" @selected(request('status') === 'pending')>Pending</option>
                    <option value="cancelled" @selected(request('status') === 'cancelled')>Cancelled</option>
                </select>
            </div>
            <div>
                <label class="block text-xs text-automotive-500 mb-1 font-medium">From</label>
                <input type="date" name="date_from" value="{{ request('date_from') }}" class="px-3 py-2 border border-automotive-200 rounded-lg text-sm focus:outline-none focus:border-safety">
            </div>
            <div>
                <label class="block text-xs text-automotive-500 mb-1 font-medium">To</label>
                <input type="date" name="date_to" value="{{ request('date_to') }}" class="px-3 py-2 border border-automotive-200 rounded-lg text-sm focus:outline-none focus:border-safety">
            </div>
            <div class="flex-1 min-w-[200px]">
                <label class="block text-xs text-automotive-500 mb-1 font-medium">Search</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Order #, name, email..." class="w-full px-3 py-2 border border-automotive-200 rounded-lg text-sm focus:outline-none focus:border-safety">
            </div>
            <button type="submit" class="px-4 py-2 bg-safety hover:bg-safety-dark text-white text-sm font-medium rounded-lg transition-colors">Filter</button>
            <a href="{{ route('admin.orders.index') }}" class="px-4 py-2 bg-automotive-100 hover:bg-automotive-200 text-automotive-600 text-sm font-medium rounded-lg transition-colors">Reset</a>
        </form>
    </div>

    {{-- Orders Table --}}
    <div class="bg-white rounded-xl border border-automotive-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-automotive-50 text-automotive-500 text-xs uppercase tracking-wider">
                    <tr>
                        <th class="text-left px-4 py-3 font-medium">Order #</th>
                        <th class="text-left px-4 py-3 font-medium">Customer</th>
                        <th class="text-left px-4 py-3 font-medium">Items</th>
                        <th class="text-left px-4 py-3 font-medium">Total</th>
                        <th class="text-left px-4 py-3 font-medium">Status</th>
                        <th class="text-left px-4 py-3 font-medium">Date</th>
                        <th class="text-right px-4 py-3 font-medium">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-automotive-50">
                    @forelse($orders as $order)
                    <tr class="hover:bg-automotive-50/50 transition-colors">
                        <td class="px-4 py-3 font-mono text-xs font-medium text-automotive-900">{{ $order->order_number }}</td>
                        <td class="px-4 py-3">
                            <p class="font-medium text-automotive-900">{{ $order->customer_name }}</p>
                            <p class="text-xs text-automotive-400">{{ $order->customer_email }}</p>
                        </td>
                        <td class="px-4 py-3 text-automotive-500">{{ $order->items->count() }}</td>
                        <td class="px-4 py-3 font-semibold text-automotive-900">${{ number_format($order->total, 2) }}</td>
                        <td class="px-4 py-3">
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-medium rounded-full border {{ $statusClass($order->status) }}">
                                {!! $statusIcon($order->status) !!}
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-automotive-500 text-xs">{{ $order->created_at->format('d M Y, H:i') }}</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="text-safety hover:text-safety-dark text-sm font-medium transition-colors">View</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-12 text-center text-automotive-400">No orders found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-automotive-100">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection
