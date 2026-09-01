@extends('layouts.master')

@section('title', 'Inquiry Sent — Bank Seized Cars for Sale')

@section('content')

<section class="py-20 bg-automotive-900 text-center">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="w-20 h-20 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        </div>
        <h1 class="text-3xl lg:text-4xl font-bold text-white mb-3">Inquiry Sent!</h1>
        <p class="text-automotive-300 text-lg mb-2">Your inquiry has been sent via WhatsApp. We'll get back to you shortly!</p>
    </div>
</section>

<section class="py-14 bg-automotive-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl border border-automotive-100 p-6 lg:p-8">
            <h2 class="text-xl font-bold text-automotive-900 mb-6">What Happens Next?</h2>

            <div class="space-y-4 mb-8">
                <div class="flex items-start gap-3 pb-3 border-b border-automotive-50">
                    <div class="w-8 h-8 bg-green-500/10 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <div>
                        <p class="font-medium text-automotive-900">WhatsApp message sent</p>
                        <p class="text-sm text-automotive-400">Your inquiry has been delivered to our team.</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 pb-3 border-b border-automotive-50">
                    <div class="w-8 h-8 bg-green-500/10 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                    </div>
                    <div>
                        <p class="font-medium text-automotive-900">We'll respond shortly</p>
                        <p class="text-sm text-automotive-400">Our team will confirm availability and arrange delivery details.</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 bg-green-500/10 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <div>
                        <p class="font-medium text-automotive-900">No payment yet</p>
                        <p class="text-sm text-automotive-400">Payment will be arranged directly after confirming your order.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('shop') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-safety hover:bg-safety-dark text-white font-semibold rounded-xl transition-all">
                Continue Shopping
            </a>
        </div>
    </div>
</section>

@endsection
