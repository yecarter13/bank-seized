@extends('layouts.master')

@section('title', 'Privacy Policy — Bank Seized Cars for Sale')

@section('content')

<section class="bg-automotive-900 py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-3 py-1 bg-safety/90 text-white text-xs font-semibold uppercase tracking-widest rounded-full mb-4">Legal</span>
        <h1 class="text-3xl lg:text-5xl font-bold text-white mb-4">Privacy Policy</h1>
        <p class="text-lg text-automotive-300 max-w-2xl mx-auto">How we collect, use, and protect your personal data</p>
    </div>
</section>

<section class="py-12 lg:py-16 bg-automotive-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl border border-automotive-100 p-8 lg:p-10 space-y-8">
            <div>
                <h2 class="text-xl font-bold text-automotive-900 mb-3">Who We Are</h2>
                <p class="text-automotive-600 leading-relaxed">Bank Seized Cars for Sale is a business registered in Burlington, Vermont, USA. This privacy policy explains how we collect, use, and protect your personal information when you use our website and services.</p>
            </div>
            <div>
                <h2 class="text-xl font-bold text-automotive-900 mb-3">Information We Collect</h2>
                <ul class="space-y-2 text-automotive-600">
                    <li class="flex items-start gap-2"><svg class="w-4 h-4 text-safety mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg> Name, email address, phone number, and delivery address</li>
                    <li class="flex items-start gap-2"><svg class="w-4 h-4 text-safety mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg> Payment information (processed securely — we do not store card details)</li>
                    <li class="flex items-start gap-2"><svg class="w-4 h-4 text-safety mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg> Browsing behaviour and order history</li>
                </ul>
            </div>
            <div>
                <h2 class="text-xl font-bold text-automotive-900 mb-3">How We Use Your Data</h2>
                <ul class="space-y-2 text-automotive-600">
                    <li class="flex items-start gap-2"><svg class="w-4 h-4 text-safety mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg> To process and deliver your orders</li>
                    <li class="flex items-start gap-2"><svg class="w-4 h-4 text-safety mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg> To provide customer support and respond to enquiries</li>
                    <li class="flex items-start gap-2"><svg class="w-4 h-4 text-safety mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg> To send order updates and delivery notifications</li>
                    <li class="flex items-start gap-2"><svg class="w-4 h-4 text-safety mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg> To improve our website and product offerings</li>
                </ul>
            </div>
            <div>
                <h2 class="text-xl font-bold text-automotive-900 mb-3">Data Protection</h2>
                <p class="text-automotive-600 leading-relaxed">We implement appropriate technical and organisational measures to protect your personal data against unauthorised access, alteration, disclosure, or destruction. All payment transactions are encrypted using 256-bit SSL technology and processed through a PCI DSS Level 1 compliant payment processor.</p>
            </div>
            <div>
                <h2 class="text-xl font-bold text-automotive-900 mb-3">Your Rights</h2>
                <p class="text-automotive-600 leading-relaxed">Under applicable data protection laws, you have the right to access, rectify, or erase your personal data. You may also restrict or object to processing, and request data portability. To exercise these rights, please contact us.</p>
            </div>
        </div>
    </div>
</section>

@endsection
