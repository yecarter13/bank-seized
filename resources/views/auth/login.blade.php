<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="X-Frame-Options" content="DENY">
    <meta http-equiv="Referrer-Policy" content="strict-origin-when-cross-origin">
    <title>Admin Login — Bank Seized Cars</title>
    @vite('resources/css/app.css')
    <style>
        body { font-family: 'Instrument Sans', system-ui, sans-serif; }
        .login-bg { background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%); }
        .login-card { background: rgba(255,255,255,0.98); backdrop-filter: blur(20px); }
        .input-field { transition: all 0.2s ease; }
        .input-field:focus { border-color: #ff6b00; box-shadow: 0 0 0 3px rgba(255,107,0,0.1); }
        .btn-primary { background: #ff6b00; transition: all 0.2s ease; }
        .btn-primary:hover { background: #e65c00; transform: translateY(-1px); box-shadow: 0 4px 15px rgba(255,107,0,0.3); }
        .btn-primary:active { transform: translateY(0); }
        .error-fade { animation: fadeIn 0.3s ease; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(-5px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="h-full login-bg flex items-center justify-center p-4 min-h-screen">
    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2.5 text-white hover:text-safety transition-colors">
                <svg class="w-8 h-8" viewBox="0 0 40 40" fill="none"><rect width="40" height="40" rx="10" fill="#ff6b00"/><path d="M12 20L18 14L24 20M18 14V28" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span class="text-xl font-bold">Bank <span class="text-safety font-light">Seized Cars</span></span>
            </a>
        </div>

        <div class="login-card rounded-2xl shadow-2xl p-8 border border-white/20">
            <h1 class="text-2xl font-bold text-automotive-900 text-center mb-1">Admin Login</h1>
            <p class="text-sm text-automotive-400 text-center mb-6">Sign in to manage your store</p>

            @if(session('success'))
                <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-700 text-sm rounded-lg error-fade flex items-center gap-2">
                    <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg error-fade">
                    @foreach($errors->all() as $error)
                        <p class="text-red-600 text-sm flex items-center gap-2 {{ !$loop->first ? 'mt-1' : '' }}">
                            <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                            {{ $error }}
                        </p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" autocomplete="off">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-automotive-900 mb-1.5">Email Address</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-automotive-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </span>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="input-field w-full pl-10 pr-4 py-2.5 border border-automotive-200 rounded-xl text-sm text-automotive-900 placeholder-automotive-300 focus:outline-none">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-automotive-900 mb-1.5">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-automotive-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </span>
                        <input type="password" name="password" id="password" required autocomplete="current-password" class="input-field w-full pl-10 pr-4 py-2.5 border border-automotive-200 rounded-xl text-sm text-automotive-900 placeholder-automotive-300 focus:outline-none">
                    </div>
                </div>

                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" value="1" class="rounded border-automotive-300 text-safety focus:ring-safety focus:ring-offset-0 cursor-pointer" {{ old('remember') ? 'checked' : '' }}>
                        <span class="text-sm text-automotive-500 select-none">Remember me</span>
                    </label>
                </div>

                <button type="submit" class="btn-primary w-full py-3 text-white font-semibold rounded-xl text-sm shadow-lg">
                    Sign In
                </button>
            </form>

            <div class="mt-6 pt-4 border-t border-automotive-100 text-center">
                <p class="text-xs text-automotive-400">
                    Secure login &bull; HTTPS only &bull; Rate limited
                </p>
            </div>
        </div>

        <p class="text-center mt-8 text-automotive-400 text-xs">
            &copy; {{ date('Y') }} Bank Seized Cars. All rights reserved.
        </p>
    </div>
</body>
</html>
