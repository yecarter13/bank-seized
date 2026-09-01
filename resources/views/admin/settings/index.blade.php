@extends('admin.layouts.master')

@section('title', 'Site Settings')

@section('content')
<form action="{{ route('admin.settings.update') }}" method="POST" class="max-w-3xl">
    @csrf

    <div class="bg-white rounded-xl border border-automotive-100 p-6 mb-6">
        <h2 class="font-semibold text-automotive-900 mb-1">Ordering Mode</h2>
        <p class="text-sm text-automotive-500 mb-4">Choose how customers place orders on the site.</p>
        <div class="space-y-3">
            @php $orderMode = App\Models\SiteSetting::getValue('order_mode', 'checkout'); @endphp
            <label class="flex items-start gap-3 p-4 border rounded-xl cursor-pointer transition-all {{ $orderMode === 'checkout' ? 'border-safety bg-orange-50' : 'border-automotive-200 hover:border-automotive-300' }}">
                <input type="radio" name="order_mode" value="checkout" class="mt-1 accent-orange-500" {{ $orderMode === 'checkout' ? 'checked' : '' }}>
                <div>
                    <p class="font-semibold text-sm text-automotive-900">Online Checkout (Stripe)</p>
                    <p class="text-xs text-automotive-500 mt-0.5">Customers pay directly on the site via Stripe. Full cart + checkout flow is active.</p>
                </div>
            </label>
            <label class="flex items-start gap-3 p-4 border rounded-xl cursor-pointer transition-all {{ $orderMode === 'whatsapp' ? 'border-green-500 bg-green-50' : 'border-automotive-200 hover:border-automotive-300' }}">
                <input type="radio" name="order_mode" value="whatsapp" class="mt-1 accent-green-500" {{ $orderMode === 'whatsapp' ? 'checked' : '' }}>
                <div>
                    <p class="font-semibold text-sm text-automotive-900">WhatsApp Orders</p>
                    <p class="text-xs text-automotive-500 mt-0.5">Online payment is disabled. Every order button redirects to WhatsApp with the product/cart details pre-filled. The WhatsApp number above must be set.</p>
                </div>
            </label>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-automotive-100 p-6 mb-6">
        <h2 class="font-semibold text-automotive-900 mb-4">Contact Information</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-automotive-900 mb-1.5">WhatsApp Number</label>
                <input type="text" name="whatsapp_number" value="{{ App\Models\SiteSetting::getValue('whatsapp_number') }}" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all" placeholder="447123456789">
            </div>
            <div>
                <label class="block text-sm font-medium text-automotive-900 mb-1.5">Phone</label>
                <input type="text" name="phone" value="{{ App\Models\SiteSetting::getValue('phone') }}" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all">
            </div>
            <div>
                <label class="block text-sm font-medium text-automotive-900 mb-1.5">Email</label>
                <input type="email" name="email" value="{{ App\Models\SiteSetting::getValue('email') }}" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all">
            </div>
            <div>
                <label class="block text-sm font-medium text-automotive-900 mb-1.5">Opening Hours</label>
                <input type="text" name="opening_hours" value="{{ App\Models\SiteSetting::getValue('opening_hours') }}" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all">
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-sm font-medium text-automotive-900 mb-1.5">Address</label>
            <textarea name="address" rows="2" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all">{{ App\Models\SiteSetting::getValue('address') }}</textarea>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-automotive-100 p-6 mb-6">
        <h2 class="font-semibold text-automotive-900 mb-4">Social Media</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-automotive-900 mb-1.5">Facebook URL</label>
                <input type="url" name="facebook_url" value="{{ App\Models\SiteSetting::getValue('facebook_url') }}" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all" placeholder="https://facebook.com/...">
            </div>
            <div>
                <label class="block text-sm font-medium text-automotive-900 mb-1.5">Instagram URL</label>
                <input type="url" name="instagram_url" value="{{ App\Models\SiteSetting::getValue('instagram_url') }}" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all" placeholder="https://instagram.com/...">
            </div>
            <div>
                <label class="block text-sm font-medium text-automotive-900 mb-1.5">TikTok URL</label>
                <input type="url" name="tiktok_url" value="{{ App\Models\SiteSetting::getValue('tiktok_url') }}" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all" placeholder="https://tiktok.com/@...">
            </div>
            <div>
                <label class="block text-sm font-medium text-automotive-900 mb-1.5">Twitter / X URL</label>
                <input type="url" name="twitter_url" value="{{ App\Models\SiteSetting::getValue('twitter_url') }}" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all" placeholder="https://twitter.com/...">
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-automotive-100 p-6 mb-6">
        <h2 class="font-semibold text-automotive-900 mb-4">Banners & Media</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-automotive-900 mb-1.5">Hero Banner 1</label>
                <input type="url" name="hero_banner_1" value="{{ App\Models\SiteSetting::getValue('hero_banner_1') }}" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all" placeholder="https://...">
                <p class="text-xs text-automotive-400 mt-1">Homepage hero slide 1 (1920x600)</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-automotive-900 mb-1.5">Hero Banner 2</label>
                <input type="url" name="hero_banner_2" value="{{ App\Models\SiteSetting::getValue('hero_banner_2') }}" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all" placeholder="https://...">
                <p class="text-xs text-automotive-400 mt-1">Homepage hero slide 2</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-automotive-900 mb-1.5">Hero Banner 3</label>
                <input type="url" name="hero_banner_3" value="{{ App\Models\SiteSetting::getValue('hero_banner_3') }}" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all" placeholder="https://...">
                <p class="text-xs text-automotive-400 mt-1">Homepage hero slide 3</p>
            </div>
        </div>
    </div>

    <button type="submit" class="px-6 py-2.5 bg-safety hover:bg-safety-dark text-white font-semibold rounded-lg text-sm transition-all duration-200">
        Save Settings
    </button>
</form>

@push('scripts')
<script>
document.querySelectorAll('input[type="url"]').forEach(input => {
    input.addEventListener('blur', function() {
        if (this.value && this.previousElementSibling?.tagName !== 'P') {
            const preview = this.closest('div').querySelector('.preview');
            if (preview) preview.src = this.value;
        }
    });
});
</script>
@endpush
@endsection
