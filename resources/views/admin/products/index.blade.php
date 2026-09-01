@extends('admin.layouts.master')

@section('title', 'Vehicles')

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-automotive-500 text-sm">Manage your vehicle inventory</p>
    <a href="{{ route('admin.products.create') }}" class="px-4 py-2 bg-safety hover:bg-safety-dark text-white font-semibold rounded-lg text-sm transition-all duration-200">
        + New Vehicle
    </a>
</div>

<div class="bg-white rounded-xl border border-automotive-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-automotive-50 text-automotive-600 text-left">
                <th class="px-4 py-3 font-medium">Vehicle</th>
                <th class="px-4 py-3 font-medium hidden sm:table-cell">SKU</th>
                <th class="px-4 py-3 font-medium hidden md:table-cell">Category</th>
                <th class="px-4 py-3 font-medium hidden lg:table-cell">Brand</th>
                <th class="px-4 py-3 font-medium">Price</th>
                <th class="px-4 py-3 font-medium hidden lg:table-cell">Stock</th>
                <th class="px-4 py-3 font-medium text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-automotive-100">
            @forelse($products as $p)
            <tr class="hover:bg-automotive-50 transition-colors">
                <td class="px-4 py-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-automotive-100 rounded-lg overflow-hidden flex-shrink-0">
                            @if($p->image)<img src="{{ $p->image }}" alt="" class="w-full h-full object-cover">@endif
                        </div>
                        <div>
                            <p class="font-medium text-automotive-900">{{ Str::limit($p->name, 40) }}</p>
                            @if($p->is_new)<span class="text-xs text-cta font-medium">New</span>@endif
                        </div>
                    </div>
                </td>
                <td class="px-4 py-3 text-automotive-500 hidden sm:table-cell">{{ $p->sku }}</td>
                <td class="px-4 py-3 text-automotive-500 hidden md:table-cell">{{ $p->category?->name ?? '-' }}</td>
                <td class="px-4 py-3 text-automotive-500 hidden lg:table-cell">{{ $p->brand ?: '-' }}</td>
                <td class="px-4 py-3 font-medium text-automotive-900">${{ number_format($p->price, 2) }}</td>
                <td class="px-4 py-3 hidden lg:table-cell">
                    <span class="px-2 py-0.5 text-xs font-medium rounded {{ $p->stock_quantity > 5 ? 'bg-green-50 text-green-600' : ($p->stock_quantity > 0 ? 'bg-yellow-50 text-yellow-600' : 'bg-cta/10 text-cta') }}">
                        {{ $p->stock_quantity }}
                    </span>
                </td>
                <td class="px-4 py-3 text-right">
                    <a href="{{ route('product.show', $p->slug) }}" target="_blank" class="text-automotive-400 hover:text-automotive-600 text-sm font-medium transition-colors" title="View on site">View</a>
                    <a href="{{ route('admin.products.edit', $p) }}" class="text-safety hover:text-safety-dark text-sm font-medium transition-colors ml-3">Edit</a>
                    <button class="text-cta hover:text-cta-dark text-sm font-medium transition-colors ml-3" onclick="openDeleteModal('{{ addslashes($p->name) }}', '{{ route('admin.products.destroy', $p) }}')">Delete</button>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="px-4 py-8 text-center text-automotive-400">No vehicles yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $products->links() }}</div>

{{-- Delete Modal --}}
<div id="deleteModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-sm mx-4 p-6">
        <div class="text-center">
            <div class="w-12 h-12 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6 text-cta" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
            </div>
            <h3 class="text-lg font-bold text-automotive-900 mb-2">Delete Vehicle</h3>
            <p class="text-sm text-automotive-500 mb-1">Are you sure you want to delete</p>
            <p class="text-sm font-semibold text-automotive-900 mb-6" id="deleteItemName"></p>
            <div class="flex gap-3">
                <button onclick="closeDeleteModal()" class="flex-1 px-4 py-2.5 bg-automotive-50 hover:bg-automotive-100 text-automotive-700 font-medium rounded-xl text-sm transition-all">Cancel</button>
                <form id="deleteForm" method="POST" class="flex-1">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-full px-4 py-2.5 bg-cta hover:bg-cta-dark text-white font-semibold rounded-xl text-sm transition-all">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
let deleteModal = document.getElementById('deleteModal');
let deleteForm = document.getElementById('deleteForm');
let deleteItemName = document.getElementById('deleteItemName');

function openDeleteModal(name, url) {
    deleteItemName.textContent = name;
    deleteForm.action = url;
    deleteModal.classList.remove('hidden');
    deleteModal.classList.add('flex');
}

function closeDeleteModal() {
    deleteModal.classList.add('hidden');
    deleteModal.classList.remove('flex');
}

deleteModal.addEventListener('click', function(e) {
    if (e.target === this) closeDeleteModal();
});
</script>
@endpush
@endsection
