<footer class="bg-automotive-950 border-t border-automotive-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 mb-12">
            <div>
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 mb-4">
                    <div class="w-8 h-8 bg-safety rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                        </svg>
                    </div>
                    <span class="text-lg font-bold text-white tracking-tight">Bank<span class="text-safety">Seized</span>Cars</span>
                </a>
                <p class="text-automotive-400 text-sm leading-relaxed mb-4">
                    Your trusted source for bank-repossessed vehicles in Burlington, Vermont. Quality cars at unbeatable prices with full inspection reports.
                </p>
                @php
                    $socials = [
                        ['key' => 'facebook_url', 'label' => 'Facebook', 'icon' => 'M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z'],
                        ['key' => 'twitter_url', 'label' => 'Twitter', 'icon' => 'M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z'],
                        ['key' => 'instagram_url', 'label' => 'Instagram', 'icon' => 'M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm4.441 16.892c-2.102.144-6.784.144-8.883 0C5.282 16.736 5.017 15.622 5 12c.017-3.629.285-4.736 2.558-4.892 2.099-.144 6.782-.144 8.883 0C18.718 7.264 18.983 8.378 19 12c-.017 3.629-.285 4.736-2.559 4.892zM10 9.658l4.917 2.338L10 14.342V9.658z'],
                        ['key' => 'tiktok_url', 'label' => 'TikTok', 'icon' => 'M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z'],
                    ];
                @endphp
                <div class="flex items-center gap-3">
                    @foreach($socials as $s)
                        @php $url = App\Models\SiteSetting::getValue($s['key']); @endphp
                        @if($url && $url !== '#')
                        <a href="{{ $url }}" target="_blank" rel="noopener" class="w-9 h-9 bg-automotive-800 hover:bg-safety rounded-lg flex items-center justify-center text-automotive-400 hover:text-white transition-all duration-200" title="{{ $s['label'] }}">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="{{ $s['icon'] }}"/></svg>
                        </a>
                        @endif
                    @endforeach
                </div>
            </div>

            <div>
                <h3 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Quick Links</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('shop') }}" class="text-automotive-400 hover:text-safety text-sm transition-colors duration-200">All Vehicles</a></li>
                    <li><a href="{{ route('shop') }}?sort=newest" class="text-automotive-400 hover:text-safety text-sm transition-colors duration-200">New Inventory</a></li>
                    <li><a href="{{ route('shop') }}" class="text-automotive-400 hover:text-safety text-sm transition-colors duration-200">Current Deals</a></li>
                    <li><a href="{{ route('about') }}" class="text-automotive-400 hover:text-safety text-sm transition-colors duration-200">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="text-automotive-400 hover:text-safety text-sm transition-colors duration-200">Contact Us</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Customer Service</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('shop') }}" class="text-automotive-400 hover:text-safety text-sm transition-colors duration-200">Vehicle Inspection Reports</a></li>
                    <li><a href="{{ route('shop') }}" class="text-automotive-400 hover:text-safety text-sm transition-colors duration-200">Purchase Process</a></li>
                    <li><a href="{{ route('privacy') }}" class="text-automotive-400 hover:text-safety text-sm transition-colors duration-200">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}" class="text-automotive-400 hover:text-safety text-sm transition-colors duration-200">Terms & Conditions</a></li>
                    <li><a href="{{ route('warranty') }}" class="text-automotive-400 hover:text-safety text-sm transition-colors duration-200">Warranty Information</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Contact Info</h3>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3">
                        <svg class="w-4 h-4 text-safety flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span class="text-automotive-400 text-sm">+19097845166</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-4 h-4 text-safety flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        <span class="text-automotive-400 text-sm">WhatsApp: +12174811401</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-automotive-800 pt-8">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
                <div class="flex flex-col items-center gap-4">
                    <span class="text-automotive-500 text-xs uppercase tracking-wider font-medium">Contact Us</span>
                    <div class="flex items-center gap-4 flex-wrap justify-center">
                        <a href="tel:+19097845166" class="flex items-center gap-2 text-automotive-400 hover:text-safety text-sm transition-colors duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            +19097845166
                        </a>
                        <a href="https://wa.me/12174811401" target="_blank" rel="noopener" class="flex items-center gap-2 text-automotive-400 hover:text-safety text-sm transition-colors duration-200">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            WhatsApp: +12174811401
                        </a>
                    </div>
                </div>
                <p class="text-automotive-600 text-xs">
                    &copy; 2026 Bank Seized Cars for Sale. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>
