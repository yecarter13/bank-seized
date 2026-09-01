@extends('layouts.master')

@section('title', 'All Body Types — Bank Seized Cars')

@section('content')

<section class="bg-automotive-900 py-12 lg:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
            <div>
                <h1 class="text-3xl lg:text-4xl font-bold text-white">All Categories</h1>
                <p class="text-automotive-300 mt-2">{{ $categories->sum('count') }} parts across {{ $categories->count() }} categories</p>
            </div>
            <div class="flex items-center gap-3 text-sm">
                <a href="{{ route('home') }}" class="text-automotive-400 hover:text-white transition-colors">Home</a>
                <svg class="w-4 h-4 text-automotive-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="text-white font-medium">Categories</span>
            </div>
        </div>
    </div>
</section>

<section class="py-12 lg:py-16 bg-automotive-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 lg:gap-6">
            @foreach($categories as $cat)
            <a href="{{ route('shop', ['category' => $cat->slug]) }}" class="group bg-white rounded-xl border border-automotive-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="aspect-[4/3] bg-automotive-50 overflow-hidden">
                    <img src="{{ asset('images/' . $cat->image) }}" alt="{{ $cat->name }}" class="w-full h-full object-contain p-4 group-hover:scale-110 transition-transform duration-500" loading="lazy" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-10 h-10 text-automotive-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4\'/></svg></div>'">
                </div>
                <div class="p-3 text-center">
                    <h3 class="font-semibold text-automotive-900 text-sm">{{ $cat->name }}</h3>
                    <p class="text-automotive-400 text-xs mt-0.5">{{ number_format($cat->count) }} Vehicles</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

@endsection
