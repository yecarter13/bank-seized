@extends('layouts.master')

@section('title', 'Warranty Information — Bank Seized Cars for Sale')

@section('content')

<section class="bg-automotive-900 py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-3 py-1 bg-safety/90 text-white text-xs font-semibold uppercase tracking-widest rounded-full mb-4">Customer Service</span>
        <h1 class="text-3xl lg:text-5xl font-bold text-white mb-4">Warranty Information</h1>
        <p class="text-lg text-automotive-300 max-w-2xl mx-auto">Limited warranty coverage on our seized vehicles</p>
    </div>
</section>

<section class="py-12 lg:py-16 bg-automotive-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl border border-automotive-100 p-8 lg:p-10 space-y-8">
            <div>
                <h2 class="text-xl font-bold text-automotive-900 mb-3">30-Day Powertrain Warranty</h2>
                <p class="text-automotive-600 leading-relaxed">All vehicles sold by Bank Seized Cars for Sale come with a <strong>30-day limited powertrain warranty</strong> from the date of purchase. This warranty covers critical powertrain components including the engine, transmission, and drivetrain, provided these components were functioning at the time of sale.</p>
            </div>
            <div>
                <h2 class="text-xl font-bold text-automotive-900 mb-3">What Is Covered</h2>
                <ul class="space-y-2 text-automotive-600">
                    <li class="flex items-start gap-2"><svg class="w-4 h-4 text-green-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Engine and internal components</li>
                    <li class="flex items-start gap-2"><svg class="w-4 h-4 text-green-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Transmission (automatic or manual)</li>
                    <li class="flex items-start gap-2"><svg class="w-4 h-4 text-green-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Drivetrain components (axles, driveshaft, differential)</li>
                </ul>
            </div>
            <div>
                <h2 class="text-xl font-bold text-automotive-900 mb-3">As-Is Disclaimer</h2>
                <p class="text-automotive-600 leading-relaxed">All vehicles are sold <strong>as-is</strong> for cosmetic and appearance items, including but not limited to: paint, body panels, interior upholstery, trim, glass, tires, wheels, and accessories. No warranty is provided for these items. It is the buyer's responsibility to inspect cosmetic condition before purchase.</p>
            </div>
            <div>
                <h2 class="text-xl font-bold text-automotive-900 mb-3">Pre-Existing Conditions</h2>
                <p class="text-automotive-600 leading-relaxed">This warranty does <strong>not cover pre-existing conditions</strong>, including but not limited to: prior body work, prior paint work, previous flood or salvage damage, normal wear and tear, rust, dents, scratches, or any condition disclosed in the vehicle listing at the time of sale.</p>
            </div>
            <div>
                <h2 class="text-xl font-bold text-automotive-900 mb-3">How to Make a Warranty Claim</h2>
                <ol class="space-y-3 text-automotive-600 list-decimal list-inside">
                    <li>Contact our team within the 30-day warranty period with your purchase agreement and a description of the issue</li>
                    <li>Provide photographs or video evidence where possible</li>
                    <li>Our team will assess the claim and respond within 2 business days</li>
                    <li>If approved, we will arrange repair or replacement at our discretion</li>
                </ol>
            </div>
        </div>
    </div>
</section>

@endsection
