<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Bank Seized Cars for Sale — Burlington, VT')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="alternate icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white text-automotive-900">

    @include('partials.header')

    <main class="min-h-screen">
        @yield('content')
    </main>

    @include('partials.footer')

    @include('partials.floating-social')

    <div id="cart-toast" class="fixed top-4 left-1/2 -translate-x-1/2 z-50 px-6 py-4 bg-automotive-900 text-white text-base font-semibold rounded-xl shadow-2xl flex items-center gap-3 transition-all duration-300 opacity-0 -translate-y-4 pointer-events-none border border-green-500/30">
        <svg class="w-6 h-6 text-green-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        <span id="cart-toast-msg">Added to cart</span>
    </div>

    <script>
    function addToCart(productId, qty, btn) {
        const toast = document.getElementById('cart-toast');
        const msg = document.getElementById('cart-toast-msg');
        btn = btn || { disabled: false, innerHTML: '' };
        btn.disabled = true;
        btn.innerHTML = '<svg class="w-4 h-4 animate-spin inline" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>';
        fetch('{{ route("cart.add") }}', {
            method: 'POST',
            headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            body: JSON.stringify({ product_id: productId, quantity: qty || 1 })
        })
        .then(r => r.json())
        .then(d => {
            document.querySelectorAll('.cart-count').forEach(el => el.textContent = d.count);
            msg.textContent = '✓ Added to cart!';
            toast.classList.remove('opacity-0', '-translate-y-4', 'pointer-events-none');
            toast.classList.add('opacity-100', 'translate-y-0');
            setTimeout(() => {
                toast.classList.add('opacity-0', '-translate-y-4', 'pointer-events-none');
                toast.classList.remove('opacity-100', 'translate-y-0');
            }, 2500);
        })
        .catch(() => {
            msg.textContent = '✕ Failed to add';
            toast.classList.remove('opacity-0', '-translate-y-4', 'pointer-events-none');
            toast.classList.add('opacity-100', 'translate-y-0');
            setTimeout(() => {
                toast.classList.add('opacity-0', '-translate-y-4', 'pointer-events-none');
                toast.classList.remove('opacity-100', 'translate-y-0');
            }, 2500);
        })
        .finally(() => {
            if (btn) { btn.disabled = false; btn.innerHTML = 'Add to Cart'; }
        });
    }

    function initSearchSuggest(inputId, suggestId) {
        const input = document.getElementById(inputId);
        const box = document.getElementById(suggestId);
        if (!input || !box) return;
        let timer;

        input.addEventListener('input', function() {
            clearTimeout(timer);
            const q = this.value.trim();
            if (q.length < 2) { box.classList.add('hidden'); return; }
            box.innerHTML = '<div class="flex items-center justify-center gap-2 px-4 py-3 text-automotive-400 text-sm"><svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg> Searching...</div>';
            box.classList.remove('hidden');
            timer = setTimeout(() => {
                fetch('/shop/suggest?q=' + encodeURIComponent(q))
                    .then(r => r.json())
                    .then(d => {
                        if (!d.products?.length && !d.brands?.length) {
                            box.innerHTML = '<div class="px-4 py-3 text-sm text-automotive-400 text-center">No products found — try a different spelling</div><a href="/shop?search=' + encodeURIComponent(q) + '" onmousedown="window.location=this.href" class="block px-3 py-2 text-center text-xs font-medium text-safety hover:bg-automotive-50 transition-colors border-t border-automotive-100">See all results →</a>';
                            box.classList.remove('hidden');
                            return;
                        }
                        let html = '';
                        if (d.brands?.length) {
                            html += '<div class="px-3 py-2 text-[11px] font-semibold text-automotive-400 uppercase tracking-wider bg-automotive-50">Brands</div>';
                            d.brands.forEach(b => {
                                html += '<a href="/shop?make=' + encodeURIComponent(b) + '" onmousedown="window.location=this.href" class="flex items-center gap-2 px-3 py-2 text-sm text-automotive-700 hover:bg-automotive-50 transition-colors"><svg class="w-3.5 h-3.5 text-automotive-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>' + b + '</a>';
                            });
                        }
                        if (d.products?.length) {
                            html += '<div class="px-3 py-2 text-[11px] font-semibold text-automotive-400 uppercase tracking-wider bg-automotive-50 border-t border-automotive-100">Products</div>';
                            d.products.forEach(p => {
                                html += '<a href="/product/' + p.slug + '" onmousedown="window.location=this.href" class="flex items-center gap-3 px-3 py-2 hover:bg-automotive-50 transition-colors"><div class="w-8 h-8 bg-automotive-100 rounded-lg flex-shrink-0 overflow-hidden"><img src="' + (p.image || 'https://images.unsplash.com/photo-1578643463396-0997cb5328c1?w=48&q=80') + '" alt="" class="w-full h-full object-cover"></div><div class="flex-1 min-w-0"><p class="text-sm font-medium text-automotive-900 truncate">' + p.name + '</p><p class="text-xs text-automotive-400">' + (p.brand ? p.brand + ' · ' : '') + p.price + '</p></div></a>';
                            });
                        }
                        html += '<a href="/shop?search=' + encodeURIComponent(q) + '" class="block px-3 py-2 text-center text-xs font-medium text-safety hover:bg-automotive-50 transition-colors border-t border-automotive-100" onmousedown="window.location=this.href">See all results →</a>';
                        box.innerHTML = html;
                        box.classList.remove('hidden');
                    });
            }, 300);
        });
        input.addEventListener('blur', function() {
            setTimeout(() => box.classList.add('hidden'), 200);
        });
        input.addEventListener('focus', function() {
            if (box.children.length) box.classList.remove('hidden');
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        initSearchSuggest('search-desktop', 'suggest-desktop');
        initSearchSuggest('search-navbar-mobile', 'suggest-navbar-mobile');
        initSearchSuggest('search-hero', 'suggest-hero');
    });
    </script>

    @stack('scripts')
</body>
</html>
