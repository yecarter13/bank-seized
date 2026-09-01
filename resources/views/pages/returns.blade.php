@extends('layouts.master')

@section('title', 'Purchase Policy — Bank Seized Cars for Sale')

@section('content')

<section class="bg-automotive-900 py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-3 py-1 bg-safety/90 text-white text-xs font-semibold uppercase tracking-widest rounded-full mb-4">Customer Service</span>
        <h1 class="text-3xl lg:text-5xl font-bold text-white mb-4">Purchase Policy</h1>
        <p class="text-lg text-automotive-300 max-w-2xl mx-auto">Important information about purchasing vehicles from us</p>
    </div>
</section>

<section class="py-12 lg:py-16 bg-automotive-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl border border-automotive-100 p-8 lg:p-10 space-y-8">
            <div>
                <h2 class="text-xl font-bold text-automotive-900 mb-3">All Sales Are Final</h2>
                <p class="text-automotive-600 leading-relaxed">All vehicle sales are final after the buyer has completed a personal inspection and signed the purchase agreement. We encourage all buyers to thoroughly inspect the vehicle before finalizing the transaction.</p>
            </div>
            <div>
                <h2 class="text-xl font-bold text-automotive-900 mb-3">3-Day Inspection Period</h2>
                <p class="text-automotive-600 leading-relaxed">Buyers have a <strong>3-day inspection period</strong> from the date of purchase to identify any mechanical issues not disclosed at the time of sale. If a material mechanical defect is discovered that was not disclosed, please contact us immediately.</p>
            </div>
            <div>
                <h2 class="text-xl font-bold text-automotive-900 mb-3">Sold As-Is</h2>
                <p class="text-automotive-600 leading-relaxed">All vehicles are sold <strong>as-is</strong> with full disclosure of known condition. Any known defects, damage, or mechanical issues are documented in the vehicle listing. It is the buyer's responsibility to review all provided information before purchase.</p>
            </div>
            <div>
                <h2 class="text-xl font-bold text-automotive-900 mb-3">Refund Policy</h2>
                <p class="text-automotive-600 leading-relaxed">A refund will only be issued if the vehicle <strong>materially differs from the description</strong> provided in the listing. If you believe your vehicle qualifies, contact us within <strong>24 hours</strong> of discovering the issue with supporting documentation.</p>
            </div>
            <div>
                <h2 class="text-xl font-bold text-automotive-900 mb-3">Contact Us</h2>
                <p class="text-automotive-600 leading-relaxed">If you have any concerns about your purchase, please contact us within <strong>24 hours</strong> of the issue. Our team is available Monday through Saturday, 9:00 AM – 6:00 PM to assist you.</p>
            </div>
        </div>
    </div>
</section>

@endsection
