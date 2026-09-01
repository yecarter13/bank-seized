@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
    <div class="bg-white rounded-xl border border-automotive-100 p-5">
        <p class="text-automotive-400 text-sm">Total Vehicles</p>
        <p class="text-3xl font-bold text-automotive-900 mt-1">{{ $stats['products'] }}</p>
    </div>
    <div class="bg-white rounded-xl border border-automotive-100 p-5">
        <p class="text-automotive-400 text-sm">Body Types</p>
        <p class="text-3xl font-bold text-automotive-900 mt-1">{{ $stats['categories'] }}</p>
    </div>
    <div class="bg-white rounded-xl border border-automotive-100 p-5">
        <p class="text-automotive-400 text-sm">Registered Users</p>
        <p class="text-3xl font-bold text-automotive-900 mt-1">{{ $stats['users'] }}</p>
    </div>
    <div class="bg-white rounded-xl border border-automotive-100 p-5">
        <p class="text-automotive-400 text-sm">Low Stock Items</p>
        <p class="text-3xl font-bold {{ $stats['low_stock'] > 0 ? 'text-cta' : 'text-automotive-900' }} mt-1">{{ $stats['low_stock'] }}</p>
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-8">
    <div class="bg-white rounded-xl border border-green-100 p-5">
        <p class="text-green-600 text-sm font-medium">Revenue Today</p>
        <p class="text-3xl font-bold text-green-700 mt-1">${{ number_format($stats['revenue_today'], 2) }}</p>
    </div>
    <div class="bg-white rounded-xl border border-blue-100 p-5">
        <p class="text-blue-600 text-sm font-medium">Revenue This Month</p>
        <p class="text-3xl font-bold text-blue-700 mt-1">${{ number_format($stats['revenue_month'], 2) }}</p>
    </div>
</div>

<div class="grid lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-xl border border-automotive-100 p-5">
        <h2 class="font-semibold text-automotive-900 mb-4">Recent Vehicles</h2>
        <div class="space-y-3">
            @forelse($recentProducts as $p)
            <div class="flex items-center justify-between py-2 border-b border-automotive-50 last:border-0">
                <div>
                    <p class="text-sm font-medium text-automotive-900">{{ $p->name }}</p>
                    <p class="text-xs text-automotive-400">SKU: {{ $p->sku }}</p>
                </div>
                <span class="text-sm font-bold text-automotive-900">${{ number_format($p->price, 2) }}</span>
            </div>
            @empty
            <p class="text-sm text-automotive-400">No vehicles yet.</p>
            @endforelse
        </div>
    </div>

    <div class="bg-white rounded-xl border border-automotive-100 p-5">
        <h2 class="font-semibold text-automotive-900 mb-4">Body Types Overview</h2>
        <div class="space-y-3">
            @forelse($categories as $cat)
            <div class="flex items-center justify-between py-2 border-b border-automotive-50 last:border-0">
                <div class="flex items-center gap-3">
                    <span class="w-2 h-2 rounded-full {{ $cat->is_active ? 'bg-green-500' : 'bg-automotive-300' }}"></span>
                    <p class="text-sm font-medium text-automotive-900">{{ $cat->name }}</p>
                </div>
                <span class="text-xs text-automotive-500">{{ $cat->products_count }} products</span>
            </div>
            @empty
            <p class="text-sm text-automotive-400">No body types yet.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
