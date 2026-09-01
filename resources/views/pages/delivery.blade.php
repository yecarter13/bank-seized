@extends('layouts.master')

@section('title', 'Vehicle Pickup & Delivery — Bank Seized Cars for Sale')

@section('content')

<section class="bg-automotive-900 py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-3 py-1 bg-safety/90 text-white text-xs font-semibold uppercase tracking-widest rounded-full mb-4">Customer Service</span>
        <h1 class="text-3xl lg:text-5xl font-bold text-white mb-4">Vehicle Pickup & Delivery</h1>
        <p class="text-lg text-automotive-300 max-w-2xl mx-auto">Convenient pickup and delivery options for your purchased vehicle</p>
    </div>
</section>

<section class="py-12 lg:py-16 bg-automotive-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl border border-automotive-100 p-8 lg:p-10 space-y-8">
            <div>
                <h2 class="text-xl font-bold text-automotive-900 mb-3">Vehicle Pickup</h2>
                <p class="text-automotive-600 leading-relaxed">All purchased vehicles are available for pickup at our facility located at <strong>1675 Shelburne Rd, South Burlington, VT 05403</strong>. Our pickup hours are <strong>Monday through Saturday, 9:00 AM – 6:00 PM</strong>.</p>
            </div>
            <div>
                <h2 class="text-xl font-bold text-automotive-900 mb-3">Local Delivery</h2>
                <p class="text-automotive-600 leading-relaxed">We offer vehicle delivery within a <strong>100-mile radius</strong> of our South Burlington location for a flat fee. Contact us for a delivery quote based on your specific address.</p>
            </div>
            <div>
                <h2 class="text-xl font-bold text-automotive-900 mb-3">Out-of-State Delivery</h2>
                <p class="text-automotive-600 leading-relaxed">Need your vehicle delivered outside of Vermont? We arrange transport through our network of <strong>trusted, licensed carriers</strong>. Delivery times and costs vary by distance — contact us for a custom quote.</p>
            </div>
            <div>
                <h2 class="text-xl font-bold text-automotive-900 mb-3">Pickup Deadline</h2>
                <p class="text-automotive-600 leading-relaxed">All purchased vehicles must be picked up within <strong>5 business days</strong> of the purchase date. Vehicles not picked up within this timeframe may be subject to daily storage fees. Please coordinate your pickup appointment with our team after completing your purchase.</p>
            </div>
        </div>
    </div>
</section>

@endsection
