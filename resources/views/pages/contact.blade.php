@extends('layouts.master')

@section('title', 'Contact Us — Bank Seized Cars for Sale')

@section('content')

{{-- Hero --}}
<section class="bg-automotive-900 py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-3 py-1 bg-safety/90 text-white text-xs font-semibold uppercase tracking-widest rounded-full mb-4">Get in Touch</span>
        <h1 class="text-3xl lg:text-5xl font-bold text-white mb-4">Get in Touch</h1>
        <p class="text-lg text-automotive-300 max-w-2xl mx-auto">Have questions about our vehicles? We're here to help you find the right car.</p>
    </div>
</section>

{{-- WhatsApp Contact --}}
<section class="py-6 bg-automotive-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="https://wa.me/12174811401" target="_blank" rel="noopener noreferrer" class="block bg-green-600 hover:bg-green-700 rounded-xl p-6 transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 bg-white/20 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-white">Chat with Us on WhatsApp</h3>
                    <p class="text-green-100 text-sm">Quick answers about our vehicles — tap to start a conversation</p>
                    <p class="text-white font-semibold text-sm mt-1">+1 (217) 481-1401</p>
                </div>
                <svg class="w-6 h-6 text-white/80 ml-auto flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </div>
        </a>
    </div>
</section>

<section class="py-12 lg:py-16 bg-automotive-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-3 lg:gap-10">

            {{-- Contact Info Sidebar --}}
            @php
                $address = App\Models\SiteSetting::getValue('address');
                $phone = App\Models\SiteSetting::getValue('phone');
                $email = App\Models\SiteSetting::getValue('email');
                $hours = App\Models\SiteSetting::getValue('opening_hours');
            @endphp
            <div class="lg:col-span-1 space-y-5 mb-8 lg:mb-0">
                @if($address)
                <div class="bg-white rounded-xl border border-automotive-100 p-6 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 bg-safety/10 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-safety" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-automotive-900">Visit Our Warehouse</h3>
                            <p class="text-automotive-500 text-sm mt-1 leading-relaxed">{{ $address }}</p>
                        </div>
                    </div>
                </div>
                @endif

                @if($email)
                <div class="bg-white rounded-xl border border-safety/30 p-6 hover:shadow-lg transition-all duration-300 ring-1 ring-safety/20">
                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 bg-safety rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-automotive-900">Email Us — Preferred Contact</h3>
                            <a href="mailto:{{ $email }}" class="text-safety hover:text-safety-dark text-sm mt-1 block transition-colors font-medium">{{ $email }}</a>
                            <p class="text-automotive-400 text-xs mt-1">We aim to reply within 2 hours during business hours</p>
                        </div>
                    </div>
                </div>
                @endif

                @if($phone)
                <div class="bg-white rounded-xl border border-automotive-100 p-6 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 bg-safety/10 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-safety" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-automotive-900">Call Our Team</h3>
                            <p class="text-automotive-500 text-sm mt-1">{{ $phone }}</p>
                            @if($hours)<p class="text-automotive-400 text-xs mt-1">{{ $hours }}</p>@endif
                        </div>
                    </div>
                </div>
                @elseif($hours)
                <div class="bg-white rounded-xl border border-automotive-100 p-6 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 bg-safety/10 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-safety" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-automotive-900">Opening Hours</h3>
                            <p class="text-automotive-500 text-sm mt-1">{{ $hours }}</p>
                        </div>
                    </div>
                </div>
                @endif

                @if($hours && $phone)
                <div class="bg-white rounded-xl border border-automotive-100 p-6 hover:shadow-lg transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 bg-safety/10 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-safety" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-automotive-900">Opening Hours</h3>
                            <p class="text-automotive-500 text-sm mt-1">{{ $hours }}</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            {{-- Contact Form --}}
            <div class="lg:col-span-2">
                @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl text-green-700 text-sm flex items-center gap-3">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="bg-white rounded-xl border border-automotive-100 p-6 lg:p-8">
                    @csrf
                    <h2 class="text-2xl font-bold text-automotive-900 mb-6">Send Us a Message</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label for="name" class="block text-sm font-medium text-automotive-900 mb-1.5">Full Name <span class="text-cta">*</span></label>
                            <input type="text" id="name" name="name" required
                                   class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety focus:ring-1 focus:ring-safety transition-all @error('name') border-cta @enderror"
                                   placeholder="e.g. John Smith">
                            @error('name')<p class="text-cta text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-automotive-900 mb-1.5">Email Address <span class="text-cta">*</span></label>
                            <input type="email" id="email" name="email" required
                                   class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety focus:ring-1 focus:ring-safety transition-all @error('email') border-cta @enderror"
                                   placeholder="e.g. john@example.com">
                            @error('email')<p class="text-cta text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-automotive-900 mb-1.5">Phone Number</label>
                            <input type="tel" id="phone" name="phone"
                                   class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety focus:ring-1 focus:ring-safety transition-all"
                                   placeholder="e.g. 802-555-1234">
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-automotive-900 mb-1.5">Subject <span class="text-cta">*</span></label>
                            <select id="subject" name="subject" required
                                    class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety focus:ring-1 focus:ring-safety transition-all bg-white @error('subject') border-cta @enderror">
                                <option value="">Select a subject</option>
                                <option value="Vehicle Inquiry">Vehicle Inquiry</option>
                                <option value="Purchase Inquiry">Purchase Inquiry</option>
                                <option value="Vehicle History Report">Vehicle History Report</option>
                                <option value="Financing Options">Financing Options</option>
                                <option value="Inspection Report">Inspection Report</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('subject')<p class="text-cta text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="message" class="block text-sm font-medium text-automotive-900 mb-1.5">Message <span class="text-cta">*</span></label>
                        <textarea id="message" name="message" rows="5" required
                                  class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety focus:ring-1 focus:ring-safety transition-all @error('message') border-cta @enderror"
                                  placeholder="Tell us how we can help..."></textarea>
                        @error('message')<p class="text-cta text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-safety hover:bg-safety-dark text-white font-semibold rounded-xl transition-all duration-300 shadow-lg shadow-safety/25 hover:shadow-safety/40">
                        Send Message
                        <svg class="ml-2 w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>

{{-- Map --}}
<section class="bg-white py-12 lg:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h2 class="text-2xl lg:text-3xl font-bold text-automotive-900">Find Us</h2>
            <p class="text-automotive-500 mt-2">Visit our South Burlington location or drop in for a test drive</p>
        </div>
        <div class="aspect-video max-w-5xl mx-auto bg-automotive-100 rounded-2xl overflow-hidden border border-automotive-200">
            <iframe
                src="https://www.google.com/maps?q=1675+Shelburne+Rd,+South+Burlington,+VT+05403&output=embed"
                width="100%" height="100%" style="border:0; min-height:400px;" allowfullscreen loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                onerror="this.style.display='none';this.nextElementSibling.style.display='flex'"
                title="Bank Seized Cars location"></iframe>
            <div class="hidden w-full h-full items-center justify-center bg-automotive-100" style="min-height:400px;">
                <div class="text-center p-8">
                    <svg class="w-16 h-16 text-automotive-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <p class="text-automotive-400 font-medium">Map unavailable</p>
                    <p class="text-automotive-400 text-sm">1675 Shelburne Rd, South Burlington, VT 05403</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FAQs --}}
<section class="py-12 lg:py-16 bg-automotive-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <span class="text-safety font-semibold text-sm uppercase tracking-widest">FAQs</span>
            <h2 class="text-3xl lg:text-4xl font-bold text-automotive-900 mt-2">Frequently Asked Questions</h2>
        </div>
        <div class="space-y-3">
            @foreach($faqs as $index => $faq)
            <div class="faq-item bg-white rounded-xl border border-automotive-100 overflow-hidden">
                <button class="faq-toggle w-full flex items-center justify-between p-5 text-left transition-all duration-200 hover:bg-automotive-50" data-index="{{ $index }}">
                    <span class="font-medium text-automotive-900 text-sm pr-4">{{ $faq->question }}</span>
                    <svg class="faq-icon w-5 h-5 text-automotive-400 flex-shrink-0 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="faq-answer hidden px-5 pb-5">
                    <p class="text-automotive-500 text-sm leading-relaxed">{{ $faq->answer }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.querySelectorAll('.faq-toggle').forEach(btn => {
        btn.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const icon = this.querySelector('.faq-icon');
            const isOpen = !answer.classList.contains('hidden');
            document.querySelectorAll('.faq-answer').forEach(a => a.classList.add('hidden'));
            document.querySelectorAll('.faq-icon').forEach(i => i.classList.remove('rotate-180'));
            if (!isOpen) {
                answer.classList.remove('hidden');
                icon.classList.add('rotate-180');
            }
        });
    });
</script>
@endpush

@endsection
