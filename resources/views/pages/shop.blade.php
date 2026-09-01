@extends('layouts.master')

@section('title', $categoryTitle ?? 'Browse Vehicles — Bank Seized Cars for Sale')

@section('content')

<section class="bg-automotive-900 py-12 lg:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
            <div>
                @if($currentCategory)
                <div>
                    <h1 class="text-3xl lg:text-4xl font-bold text-white">Vehicles in {{ $currentCategory->name }}</h1>
                    <p class="text-automotive-300 mt-1">{{ $total }} vehicle{{ $total !== 1 ? 's' : '' }} found in {{ $currentCategory->name }}</p>
                </div>
                @elseif($makeName)
                <div class="flex items-center gap-4 mb-2">
                    @if($makeLogo)
                    <img src="{{ $makeLogo }}" alt="{{ $makeName }}" class="w-12 h-12 lg:w-16 lg:h-16 object-contain bg-white rounded-xl p-2">
                    @endif
                    <div>
                        <h1 class="text-3xl lg:text-4xl font-bold text-white">{{ $makeName }} Vehicles</h1>
                        <p class="text-automotive-300 mt-1">{{ $total }} vehicle{{ $total !== 1 ? 's' : '' }} found for {{ $makeName }}</p>
                    </div>
                </div>
                @else
                <h1 class="text-3xl lg:text-4xl font-bold text-white">Browse Our Inventory</h1>
                <p class="text-automotive-300 mt-2">Quality bank-repossessed vehicles available now in Burlington, VT</p>
                @endif
            </div>
            <div class="flex items-center gap-3 text-sm">
                <a href="{{ route('home') }}" class="text-automotive-400 hover:text-white transition-colors">Home</a>
                <svg class="w-4 h-4 text-automotive-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="text-white font-medium">@if($makeName){{ $makeName }}@elseif($currentCategory){{ $currentCategory->name }}@else Shop @endif</span>
            </div>
        </div>
    </div>
</section>

<section class="py-10 lg:py-14 bg-automotive-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-4 lg:gap-8">

            <aside class="lg:col-span-1 mb-8 lg:mb-0">
                <div class="bg-white rounded-xl border border-automotive-100 p-5 lg:p-6 sticky top-24">
                    <div class="flex items-center justify-between mb-5">
                        <h2 class="font-semibold text-automotive-900">Filters</h2>
                        <a href="{{ route('shop') }}" class="text-xs text-safety hover:text-safety-dark font-medium transition-colors">Clear All</a>
                    </div>

                    <form action="{{ route('shop') }}" method="GET" class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-automotive-900 mb-2">Search</label>
                            <div class="relative">
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Make, model, or year..." class="w-full pl-9 pr-3 py-2 border border-automotive-200 rounded-lg text-sm focus:outline-none focus:border-safety focus:ring-1 focus:ring-safety transition-all">
                                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-automotive-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-automotive-900 mb-2">Make</label>
                            <select name="make" class="w-full px-3 py-2 border border-automotive-200 rounded-lg text-sm text-automotive-600 focus:outline-none focus:border-safety focus:ring-1 focus:ring-safety transition-all bg-white">
                                <option value="">All Makes</option>
                                @foreach($makes as $make)
                                <option value="{{ $make }}" {{ request('make') == $make ? 'selected' : '' }}>{{ $make }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-automotive-900 mb-2">Body Type</label>
                            <select name="category" class="w-full px-3 py-2 border border-automotive-200 rounded-lg text-sm text-automotive-600 focus:outline-none focus:border-safety focus:ring-1 focus:ring-safety transition-all bg-white">
                                <option value="">All Body Types</option>
                                @foreach($categories as $cat)
                                <option value="{{ $cat->slug }}" {{ request('category') == $cat->slug ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-automotive-900 mb-2">Price Range</label>
                            <div class="flex items-center gap-2">
                                <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min" min="0" class="w-full px-3 py-2 border border-automotive-200 rounded-lg text-sm focus:outline-none focus:border-safety transition-all">
                                <span class="text-automotive-400 text-sm">-</span>
                                <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max" min="0" class="w-full px-3 py-2 border border-automotive-200 rounded-lg text-sm focus:outline-none focus:border-safety transition-all">
                            </div>
                        </div>

                        <button type="submit" class="w-full py-2.5 bg-safety hover:bg-safety-dark text-white font-semibold rounded-lg transition-all duration-200 text-sm">
                            Apply Filters
                        </button>
                    </form>
                </div>
            </aside>

            <div class="lg:col-span-3">
                <div class="flex items-center justify-between mb-6">
                    <p class="text-sm text-automotive-500">Showing <span class="font-semibold text-automotive-900">{{ $products->firstItem() ?? 0 }}</span>-<span class="font-semibold text-automotive-900">{{ $products->lastItem() ?? 0 }}</span> of <span class="font-semibold text-automotive-900">{{ $total }}</span> results</p>
                    <div class="flex items-center gap-3">
                        <label class="text-sm text-automotive-500 hidden sm:block">Sort by:</label>
                        <form action="{{ route('shop') }}" method="GET">
                            @foreach(request()->except('sort', 'page') as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endforeach
                            <select name="sort" onchange="this.form.submit()" class="px-3 py-2 border border-automotive-200 rounded-lg text-sm text-automotive-600 focus:outline-none focus:border-safety bg-white">
                                <option value="popularity" {{ request('sort', 'popularity') == 'popularity' ? 'selected' : '' }}>Popularity</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                                <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Best Rated</option>
                            </select>
                        </form>
                    </div>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-2 xl:grid-cols-3 gap-3 sm:gap-5">
                    @forelse($products as $product)
                    <div class="group bg-white rounded-xl border border-automotive-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer" onclick="window.location='{{ route('product.show', $product->slug) }}'">
                        <div class="relative overflow-hidden bg-automotive-50 aspect-square">
                            <img src="{{ $product->image ?? 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?w=400&q=80' }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                            @if($product->is_new)
                            <span class="absolute top-2 left-2 px-2 py-0.5 bg-cta text-white text-[10px] font-bold rounded-lg">New</span>
                            @endif
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="px-4 py-2 bg-white/90 text-automotive-900 text-xs font-semibold rounded-lg shadow-lg">View Details</span>
                            </div>
                        </div>
                        <div class="p-3">
                            <span class="text-[10px] text-automotive-400 font-medium">{{ $product->category?->name ?? 'Vehicle' }}</span>
                            <h3 class="font-semibold text-automotive-900 text-xs leading-snug my-1 line-clamp-2">{{ $product->name }}</h3>
                            <p class="text-[10px] text-automotive-400 mb-1 truncate">{{ $product->compatibility }}</p>
                            <div class="flex items-center justify-between gap-2">
                                <div>
                                    <span class="text-base font-bold text-automotive-900">${{ number_format($product->price, 2) }}</span>
                                    @if($product->down_payment)
                                    <p class="text-[10px] text-safety font-medium">From ${{ number_format($product->down_payment, 2) }} down</p>
                                    @endif
                                </div>
                                @include('partials.product-card-cta', ['product' => $product])
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-12">
                        <svg class="w-16 h-16 text-automotive-200 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                        <p class="text-automotive-500 font-medium">No vehicles found matching your criteria.</p>
                        <a href="{{ route('shop') }}" class="text-safety hover:text-safety-dark text-sm mt-2 inline-block">Clear all filters</a>
                    </div>
                    @endforelse
                </div>

                @if($products->hasPages())
                <div class="mt-10">
                    {{ $products->links() }}
                </div>
                @endif
            </div>

        </div>
    </div>
</section>

<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@type": "ItemList",
    "itemListElement": [
        @foreach($products as $i => $product)
        {
            "@type": "ListItem",
            "position": {{ $i + 1 }},
            "name": "{{ addslashes($product->name) }}",
            "url": "{{ route('product.show', $product->slug) }}"
        }{{ $loop->last ? '' : ',' }}
        @endforeach
    ]
}
</script>

@endsection
