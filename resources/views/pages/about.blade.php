@extends('layouts.master')

@section('title', 'About Us — Bank Seized Cars for Sale')

@section('content')

{{-- Hero --}}
<section class="relative bg-automotive-900 py-20 lg:py-28 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1580273916550-e323be2ae537?w=1920&q=80" alt="Bank Seized Cars inventory" class="w-full h-full object-cover" loading="lazy">
        <div class="absolute inset-0 bg-gradient-to-r from-automotive-900/95 via-automotive-900/80 to-automotive-900/60"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-3 py-1 bg-safety/90 text-white text-xs font-semibold uppercase tracking-widest rounded-full mb-4">About Us</span>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight mb-4">Your Trusted Source for<br>Bank-Seized Vehicles</h1>
        <p class="text-lg text-automotive-200 max-w-2xl mx-auto">Serving Burlington, Vermont and surrounding areas with quality repossessed vehicles at unbeatable prices.</p>
    </div>
</section>

{{-- Story --}}
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-2 lg:gap-16 items-center">
            <div>
                <span class="text-safety font-semibold text-sm uppercase tracking-widest">Our Mission</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-automotive-900 mt-3 mb-6">Helping You Find Quality Vehicles at Fair Prices</h2>
                <div class="space-y-4 text-automotive-600 leading-relaxed">
                    <p>Bank Seized Cars was founded with a simple goal: to help people in Burlington, Vermont and surrounding areas find quality vehicles at fair prices. We specialize in bank-repossessed vehicles — cars, trucks, and SUVs that have been seized by financial institutions and are now available to the public.</p>
                    <p>Every vehicle in our inventory undergoes a thorough inspection at our facility at 1675 Shelburne Rd, South Burlington, VT. We ensure each car meets our quality standards before it's listed for sale. Full documentation, including vehicle history and inspection reports, is provided with every purchase.</p>
                    <p>Whether you're a first-time buyer looking for an affordable sedan, a family in need of a reliable SUV, or a professional seeking a work truck, we're here to help you find the right vehicle for your needs and budget.</p>
                </div>
            </div>
            <div class="mt-8 lg:mt-0">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1487754180451-c456f719a1fc?w=600&q=80" alt="Our workshop" class="rounded-2xl shadow-xl" loading="lazy">
                    <div class="absolute -bottom-6 -left-6 bg-safety rounded-2xl p-6 shadow-xl hidden lg:block">
                        <p class="text-3xl font-bold text-white">15+</p>
                        <p class="text-white/80 text-sm">Years of Excellence</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-16 lg:py-20 bg-automotive-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
            @foreach($stats as $stat)
            <div class="text-center p-6 bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl">
                <div class="w-12 h-12 mx-auto mb-4 bg-safety/10 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-safety" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat->icon }}"/></svg>
                </div>
                <p class="text-3xl lg:text-4xl font-bold text-white mb-1">{{ $stat->value }}</p>
                <p class="text-automotive-400 text-sm">{{ $stat->label }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Values --}}
<section class="py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 lg:mb-16">
            <span class="text-safety font-semibold text-sm uppercase tracking-widest">Our Values</span>
            <h2 class="text-3xl lg:text-4xl font-bold text-automotive-900 mt-2">What Drives Us</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-8 rounded-xl border border-automotive-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-16 h-16 mx-auto mb-5 bg-automotive-50 rounded-2xl flex items-center justify-center">
                    <svg class="w-8 h-8 text-safety" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-automotive-900 mb-3">Inspected & Verified</h3>
                <p class="text-automotive-500 leading-relaxed">Every vehicle in our inventory passes a thorough inspection covering mechanical, electrical, and safety systems. We don't sell cars we wouldn't drive ourselves.</p>
            </div>
            <div class="text-center p-8 rounded-xl border border-automotive-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-16 h-16 mx-auto mb-5 bg-automotive-50 rounded-2xl flex items-center justify-center">
                    <svg class="w-8 h-8 text-safety" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-8h.01"/></svg>
                </div>
                <h3 class="text-xl font-bold text-automotive-900 mb-3">Wide Selection</h3>
                <p class="text-automotive-500 leading-relaxed">Our inventory features sedans, SUVs, trucks, and more from a variety of makes and models. Whatever you're looking for, we likely have it in stock.</p>
            </div>
            <div class="text-center p-8 rounded-xl border border-automotive-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-16 h-16 mx-auto mb-5 bg-automotive-50 rounded-2xl flex items-center justify-center">
                    <svg class="w-8 h-8 text-safety" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-automotive-900 mb-3">Personal Guidance</h3>
                <p class="text-automotive-500 leading-relaxed">Our team is here to help you navigate the buying process, understand vehicle histories, and find the right car that fits your needs and budget.</p>
            </div>
        </div>
    </div>
</section>

{{-- Team --}}
<section class="py-16 lg:py-20 bg-automotive-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 lg:mb-16">
            <span class="text-safety font-semibold text-sm uppercase tracking-widest">Our Team</span>
            <h2 class="text-3xl lg:text-4xl font-bold text-automotive-900 mt-2">Meet the People Behind Bank Seized Cars</h2>
            <p class="text-automotive-500 mt-3 max-w-2xl mx-auto">A dedicated team of automotive professionals committed to your satisfaction</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
            @foreach($team as $member)
            <div class="bg-white rounded-xl border border-automotive-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 text-center">
                <div class="p-5">
                    <h3 class="font-semibold text-automotive-900">{{ $member->name }}</h3>
                    <p class="text-safety text-sm font-medium">{{ $member->role }}</p>
                    <p class="text-automotive-500 text-sm mt-2 leading-relaxed">{{ $member->bio }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-16 lg:py-20 bg-automotive-900 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-safety rounded-full blur-3xl"></div>
    </div>
    <div class="relative z-10 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">Ready to Find Your Next Car?</h2>
        <p class="text-automotive-300 mb-8 max-w-xl mx-auto">Browse our current inventory of bank-repossessed vehicles and find your next ride at an unbeatable price.</p>
        <a href="{{ route('shop') }}" class="inline-flex items-center px-8 py-3.5 bg-safety hover:bg-safety-dark text-white font-semibold rounded-xl transition-all duration-300 shadow-lg shadow-safety/25 hover:shadow-safety/40 hover:-translate-y-0.5">
            Browse Our Inventory
            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
        </a>
    </div>
</section>

@endsection
