@extends('admin.layouts.master')

@section('title', 'Send Email')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Compose Form --}}
    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl border border-automotive-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-automotive-100 bg-automotive-50">
                <h2 class="font-semibold text-automotive-900">Compose Email</h2>
            </div>
            <form method="POST" action="{{ route('admin.mail.send') }}" class="p-6 space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-automotive-700 mb-1">Recipient</label>
                    <div class="flex gap-2">
                        <input type="email" name="recipient" id="recipient" required
                               class="flex-1 px-4 py-2 border border-automotive-300 rounded-lg text-sm focus:outline-none focus:border-safety focus:ring-1 focus:ring-safety"
                               placeholder="customer@example.com" value="{{ old('recipient') }}">
                        <select id="quick-select" onchange="document.getElementById('recipient').value=this.value"
                                class="px-3 py-2 border border-automotive-300 rounded-lg text-sm bg-white focus:outline-none focus:border-safety">
                            <option value="">Quick select...</option>
                            @foreach($customers as $c)
                            <option value="{{ $c->customer_email }}">{{ $c->customer_name }} ({{ $c->customer_email }})</option>
                            @endforeach
                        </select>
                    </div>
                    @error('recipient') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-automotive-700 mb-1">Subject</label>
                    <input type="text" name="subject" required maxlength="255"
                           class="w-full px-4 py-2 border border-automotive-300 rounded-lg text-sm focus:outline-none focus:border-safety focus:ring-1 focus:ring-safety"
                           placeholder="Email subject..." value="{{ old('subject') }}">
                    @error('subject') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-automotive-700 mb-1">Message</label>
                    <textarea name="message" required rows="10" maxlength="10000"
                              class="w-full px-4 py-2 border border-automotive-300 rounded-lg text-sm focus:outline-none focus:border-safety focus:ring-1 focus:ring-safety resize-y"
                              placeholder="Write your message here...">{{ old('message') }}</textarea>
                    @error('message') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    <p class="text-xs text-automotive-400 mt-1">Plain text only — it will be automatically formatted with the Bank Seized Cars email template.</p>
                </div>

                <div class="flex items-center gap-3 pt-2">
                    <button type="submit" class="px-6 py-2.5 bg-safety text-white rounded-lg text-sm font-medium hover:bg-orange-600 transition-colors">
                        Send Email
                    </button>
                    <button type="reset" class="px-4 py-2.5 text-automotive-500 rounded-lg text-sm hover:bg-automotive-100 transition-colors">
                        Clear
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Recent Orders Sidebar --}}
    <div class="lg:col-span-1">
        <div class="bg-white rounded-xl border border-automotive-200 overflow-hidden">
            <div class="px-5 py-4 border-b border-automotive-100 bg-automotive-50">
                <h2 class="font-semibold text-automotive-900 text-sm">Recent Customers</h2>
            </div>
            <div class="divide-y divide-automotive-100 max-h-[500px] overflow-y-auto">
                @forelse($recentOrders as $order)
                <button type="button" onclick="document.getElementById('recipient').value='{{ $order->customer_email }}'; document.getElementById('recipient').focus()"
                        class="w-full text-left px-5 py-3 hover:bg-automotive-50 transition-colors">
                    <p class="text-sm font-medium text-automotive-900">{{ $order->customer_name }}</p>
                    <p class="text-xs text-automotive-400">{{ $order->customer_email }}</p>
                    <p class="text-xs text-automotive-300 mt-0.5">Order #{{ $order->order_number }} — ${{ number_format($order->total,2) }}</p>
                </button>
                @empty
                <p class="px-5 py-4 text-sm text-automotive-400">No orders yet.</p>
                @endforelse
            </div>
        </div>

        {{-- Template Preview Note --}}
        <div class="bg-white rounded-xl border border-automotive-200 overflow-hidden mt-4">
            <div class="px-5 py-4">
                <div class="flex items-center gap-2 text-automotive-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-sm text-automotive-500">Emails are sent using the same branded template as order confirmations (orange header + footer).</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    @if(session('error'))
    alert('{{ session('error') }}');
    @endif
});
</script>
@endpush
