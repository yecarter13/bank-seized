@extends('admin.layouts.master')

@section('title', $product ? 'Edit Product' : 'New Product')

@section('content')
<a href="{{ route('admin.products.index') }}" class="text-automotive-400 hover:text-automotive-600 text-sm transition-colors">&larr; Back to Products</a>

<form action="{{ $product ? route('admin.products.update', $product) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="mt-4 bg-white rounded-xl border border-automotive-100 p-6 max-w-3xl" id="productForm">
    @csrf
    @if($product) @method('PUT') @endif

    <div class="flex items-center justify-between mb-6 pb-4 border-b border-automotive-100">
        <h2 class="text-lg font-bold text-automotive-900">{{ $product ? 'Edit Product' : 'New Product' }}</h2>
        <span class="text-xs text-automotive-400 bg-automotive-50 px-2.5 py-1 rounded-lg">AutoVIN AI</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div>
            <label class="block text-sm font-medium text-automotive-900 mb-1.5">Product Name <span class="text-cta">*</span></label>
            <input type="text" name="name" id="productName" value="{{ old('name', $product?->name) }}" required class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all">
        </div>
        <div>
            <label class="block text-sm font-medium text-automotive-900 mb-1.5">SKU <span class="text-automotive-400 text-xs font-normal">(auto if empty)</span></label>
            <input type="text" name="sku" value="{{ old('sku', $product?->sku) }}" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all" placeholder="Leave empty to auto-generate">
            <p class="text-xs text-automotive-400 mt-1">Unique product reference code</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div>
            <label class="block text-sm font-medium text-automotive-900 mb-1.5">Category</label>
            <select name="category_id" id="categoryId" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all bg-white">
                <option value="">No category</option>
                @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ old('category_id', $product?->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-automotive-900 mb-1.5">Brand</label>
            <select name="brand" id="productBrand" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all bg-white">
                <option value="">Select brand</option>
                <option value="Other" {{ old('brand', $product?->brand) == 'Other' ? 'selected' : '' }}>Other</option>
                @foreach(config('brands') as $brandName => $file)
                <option value="{{ $brandName }}" {{ old('brand', $product?->brand) == $brandName ? 'selected' : '' }}>{{ $brandName }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="mb-4">
        <h3 class="text-sm font-semibold text-automotive-900 mb-3 pb-2 border-b border-automotive-100">Vehicle Details</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-automotive-900 mb-1.5">Year</label>
                <input type="text" name="year" value="{{ old('year', $product?->year) }}" placeholder="e.g. 2020" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all">
            </div>
            <div>
                <label class="block text-sm font-medium text-automotive-900 mb-1.5">Mileage</label>
                <input type="text" name="mileage" value="{{ old('mileage', $product?->mileage) }}" placeholder="e.g. 45,000 miles" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all">
            </div>
            <div>
                <label class="block text-sm font-medium text-automotive-900 mb-1.5">Transmission</label>
                <select name="transmission" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all bg-white">
                    <option value="">Select transmission</option>
                    <option value="Automatic" {{ old('transmission', $product?->transmission) == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                    <option value="Manual" {{ old('transmission', $product?->transmission) == 'Manual' ? 'selected' : '' }}>Manual</option>
                    <option value="CVT" {{ old('transmission', $product?->transmission) == 'CVT' ? 'selected' : '' }}>CVT</option>
                    <option value="Other" {{ old('transmission', $product?->transmission) == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-automotive-900 mb-1.5">Fuel Type</label>
                <select name="fuel_type" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all bg-white">
                    <option value="">Select fuel type</option>
                    <option value="Gasoline" {{ old('fuel_type', $product?->fuel_type) == 'Gasoline' ? 'selected' : '' }}>Gasoline</option>
                    <option value="Diesel" {{ old('fuel_type', $product?->fuel_type) == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                    <option value="Electric" {{ old('fuel_type', $product?->fuel_type) == 'Electric' ? 'selected' : '' }}>Electric</option>
                    <option value="Hybrid" {{ old('fuel_type', $product?->fuel_type) == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                    <option value="Plug-in Hybrid" {{ old('fuel_type', $product?->fuel_type) == 'Plug-in Hybrid' ? 'selected' : '' }}>Plug-in Hybrid</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-automotive-900 mb-1.5">VIN</label>
                <input type="text" name="vin" value="{{ old('vin', $product?->vin) }}" placeholder="Vehicle Identification Number" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all uppercase">
            </div>
            <div>
                <label class="block text-sm font-medium text-automotive-900 mb-1.5">Exterior Color</label>
                <input type="text" name="exterior_color" value="{{ old('exterior_color', $product?->exterior_color) }}" placeholder="e.g. Pearl White" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all">
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-automotive-900 mb-1.5">Interior Color</label>
                <input type="text" name="interior_color" value="{{ old('interior_color', $product?->interior_color) }}" placeholder="e.g. Black Leather" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all">
            </div>
            <div>
                <label class="block text-sm font-medium text-automotive-900 mb-1.5">Engine Size</label>
                <input type="text" name="engine_size" value="{{ old('engine_size', $product?->engine_size) }}" placeholder="e.g. 2.0L 4-Cylinder" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all">
            </div>
            <div>
                <label class="block text-sm font-medium text-automotive-900 mb-1.5">Drivetrain</label>
                <select name="drivetrain" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all bg-white">
                    <option value="">Select drivetrain</option>
                    <option value="FWD" {{ old('drivetrain', $product?->drivetrain) == 'FWD' ? 'selected' : '' }}>FWD</option>
                    <option value="RWD" {{ old('drivetrain', $product?->drivetrain) == 'RWD' ? 'selected' : '' }}>RWD</option>
                    <option value="AWD" {{ old('drivetrain', $product?->drivetrain) == 'AWD' ? 'selected' : '' }}>AWD</option>
                    <option value="4WD" {{ old('drivetrain', $product?->drivetrain) == '4WD' ? 'selected' : '' }}>4WD</option>
                </select>
            </div>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-automotive-900 mb-1.5">Condition Note</label>
            <textarea name="condition_note" rows="3" placeholder="e.g. Minor scratches on rear bumper" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all">{{ old('condition_note', $product?->condition_note) }}</textarea>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
        <div>
            <label class="block text-sm font-medium text-automotive-900 mb-1.5">Price ($) <span class="text-cta">*</span></label>
            <input type="number" step="0.01" min="0" name="price" id="productPrice" value="{{ old('price', $product?->price) }}" required class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all">
        </div>
        <div>
            <label class="block text-sm font-medium text-automotive-900 mb-1.5">Down Payment ($)</label>
            <input type="number" step="0.01" min="0" name="down_payment" value="{{ old('down_payment', $product?->down_payment) }}" placeholder="e.g. 2500" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all">
            <p class="text-xs text-automotive-400 mt-1">Minimum down payment to reserve this vehicle</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-automotive-900 mb-1.5">Old Price ($)</label>
            <input type="number" step="0.01" min="0" name="old_price" value="{{ old('old_price', $product?->old_price) }}" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all">
        </div>
        <div>
            <label class="block text-sm font-medium text-automotive-900 mb-1.5">Stock Quantity</label>
            <input type="number" min="0" name="stock_quantity" value="{{ old('stock_quantity', $product?->stock_quantity ?? 0) }}" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all">
        </div>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-automotive-900 mb-1.5">Vehicle Compatibility</label>
        <input type="text" name="compatibility" value="{{ old('compatibility', $product?->compatibility) }}" placeholder="e.g. BMW 3 Series E90 (2005-2012), Audi A4 B8 (2008-2015)" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all">
        <p class="text-xs text-automotive-400 mt-1">Enter the car make, model, and years this vehicle fits. Shown on the product page to help buyers verify compatibility.</p>
    </div>

    <div class="mb-4 p-4 bg-automotive-50 rounded-xl border border-automotive-100">
        <label class="block text-sm font-medium text-automotive-900 mb-2">Product Image</label>
        <div class="flex items-start gap-4">
            <div class="flex-shrink-0">
                <div id="image-preview" class="w-24 h-24 bg-automotive-100 rounded-xl border-2 border-dashed border-automotive-200 flex items-center justify-center overflow-hidden">
                    @if($product && $product->image)
                    <img src="{{ $product->image }}" class="w-full h-full object-cover">
                    @else
                    <svg class="w-8 h-8 text-automotive-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    @endif
                </div>
            </div>
            <div class="flex-1 space-y-2">
                <input type="file" name="image_file" id="imageFile" accept="image/*" class="w-full text-sm text-automotive-500 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-automotive-100 file:text-automotive-700 hover:file:bg-automotive-200 transition-all">
                <div class="flex items-center gap-2">
                    <span class="text-xs text-automotive-400">Or URL:</span>
                    <input type="url" name="image" id="imageUrl" value="{{ old('image', $product?->image) }}" placeholder="https://example.com/image.jpg" class="flex-1 px-3 py-1.5 border border-automotive-200 rounded-lg text-sm focus:outline-none focus:border-safety transition-all">
                </div>
                <p class="text-xs text-automotive-400">Upload an image or paste a URL. Recommended: 800&times;800px, JPG or PNG.</p>
            </div>
        </div>
    </div>

    <div class="mb-4 p-4 bg-automotive-50 rounded-xl border border-automotive-100">
        <label class="block text-sm font-medium text-automotive-900 mb-2">Gallery Images</label>
        <p class="text-xs text-automotive-400 mb-3">Upload multiple images for the product gallery. Drag to reorder.</p>
        <div class="flex gap-2 flex-wrap mb-3" id="gallery-preview">
            @if($product && $product->gallery_images)
                @foreach($product->gallery_images as $img)
                <div class="gallery-item relative w-20 h-20 bg-automotive-100 rounded-xl border border-automotive-200 overflow-hidden group" data-path="{{ $loop->index < count($storedGallery) ? $storedGallery[$loop->index] : '' }}">
                    <img src="{{ $img }}" class="w-full h-full object-cover">
                    <button type="button" class="absolute top-1 right-1 w-5 h-5 bg-cta/90 hover:bg-cta rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity" onclick="removeGalleryItem(this)"> <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg> </button>
                </div>
                @endforeach
            @endif
        </div>
        <div class="flex items-center gap-3">
            <input type="file" id="galleryFiles" accept="image/*" multiple class="w-full text-sm text-automotive-500 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-automotive-100 file:text-automotive-700 hover:file:bg-automotive-200 transition-all">
            <label class="flex items-center gap-1.5 text-xs text-automotive-400 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                Upload multiple
            </label>
        </div>
        <input type="hidden" name="gallery_images" id="galleryInput" value="{{ old('gallery_images', isset($storedGallery) && $storedGallery ? json_encode($storedGallery) : '[]') }}">
    </div>

    <div class="mb-4 p-4 bg-purple-50 border border-purple-200 rounded-xl">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                <label class="text-sm font-medium text-automotive-900">AI Description Generator</label>
            </div>
            <span class="text-xs text-automotive-400">Keywords separated by commas</span>
        </div>
        <div class="flex gap-2">
            <input type="text" id="aiKeywords" placeholder="e.g. high-performance, ceramic, road-legal" class="flex-1 px-4 py-2 border border-purple-200 rounded-lg text-sm focus:outline-none focus:border-purple-400 transition-all">
            <button type="button" id="generateAiBtn" class="px-5 py-2 bg-purple-600 hover:bg-purple-700 disabled:bg-purple-400 text-white font-semibold rounded-lg text-sm transition-all duration-200 flex items-center gap-2 flex-shrink-0">
                <svg id="ai-loader" class="w-4 h-4 hidden animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                <svg id="ai-icon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                <span id="ai-btn-text">Generate</span>
            </button>
        </div>
        <div id="ai-error" class="mt-2 hidden"></div>
        <div id="ai-success" class="mt-2 hidden"></div>
    </div>

    <div class="mb-4">
        <div class="flex items-center justify-between mb-1.5">
            <label class="block text-sm font-medium text-automotive-900">Description</label>
            <button type="button" id="mediaBrowserBtn" class="text-xs text-purple-600 hover:text-purple-800 font-medium flex items-center gap-1 transition-colors">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Media Library
            </button>
        </div>
        <textarea name="description" id="productDescription" rows="5" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all font-mono">{{ old('description', $product?->description) }}</textarea>
        <p class="text-xs text-automotive-400 mt-1">HTML supported — use Media Library to insert images &amp; videos.</p>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-automotive-900 mb-1.5">Specifications</label>
        <textarea name="specifications" id="productSpecs" rows="3" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all">{{ old('specifications', $product?->specifications) }}</textarea>
    </div>

    <div class="flex items-center gap-6 mb-6">
        <label class="flex items-center gap-2">
            <input type="checkbox" name="is_new" value="1" {{ old('is_new', $product?->is_new) ? 'checked' : '' }} class="rounded border-automotive-300 text-safety focus:ring-safety">
            <span class="text-sm text-automotive-700">Mark as New</span>
        </label>
        <label class="flex items-center gap-2">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product?->is_active ?? true) ? 'checked' : '' }} class="rounded border-automotive-300 text-safety focus:ring-safety">
            <span class="text-sm text-automotive-700">Active</span>
        </label>
    </div>

    <button type="submit" class="px-6 py-2.5 bg-safety hover:bg-safety-dark text-white font-semibold rounded-lg text-sm transition-all duration-200">
        {{ $product ? 'Update Product' : 'Create Product' }}
    </button>
</form>

@push('scripts')
<script>
// Media Browser
document.getElementById('mediaBrowserBtn')?.addEventListener('click', function() {
    if (document.getElementById('media-modal')) return;
    const overlay = document.createElement('div');
    overlay.id = 'media-modal';
    overlay.className = 'fixed inset-0 z-50 flex items-center justify-center bg-black/50';
    overlay.innerHTML = '<div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl max-h-[80vh] overflow-hidden mx-4"><div class="flex items-center justify-between p-4 border-b border-automotive-100"><h3 class="font-semibold text-automotive-900">Media Library</h3><button id="closeModal" class="p-1 hover:bg-automotive-50 rounded-lg transition-colors"><svg class="w-5 h-5 text-automotive-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button></div><div id="mediaGrid" class="p-4 grid grid-cols-4 gap-3 overflow-y-auto max-h-[60vh]"><div class="col-span-4 text-center text-automotive-400 py-8"><svg class="w-8 h-8 mx-auto mb-2 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>Loading...</div></div><div class="p-4 border-t border-automotive-100"><label class="flex items-center gap-2 cursor-pointer"><svg class="w-5 h-5 text-safety" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg><span class="text-sm text-automotive-600">Upload new file</span><input type="file" id="modalFileUpload" accept="image/*,video/mp4" class="hidden"></label></div></div>';
    document.body.appendChild(overlay);

    document.getElementById('closeModal')?.addEventListener('click', () => overlay.remove());
    overlay.addEventListener('click', function(e) { if (e.target === this) overlay.remove(); });

    fetch('{{ route("admin.media.browser") }}')
        .then(r => r.json())
        .then(files => {
            const grid = document.getElementById('mediaGrid');
            if (!files.length) {
                grid.innerHTML = '<div class="col-span-4 text-center text-automotive-400 py-8">No media uploaded yet. Upload an image or video above.</div>';
                return;
            }
            grid.innerHTML = files.map(f => {
                const isVideo = f.name.match(/\.(mp4|webm|ogg)$/i);
                const tag = isVideo ? '<video src="' + f.url + '" class="w-full h-full object-cover"></video>' : '<img src="' + f.url + '" class="w-full h-full object-cover">';
                const code = isVideo ? '<video controls><source src="' + f.url + '" type="video/mp4"></video>' : '<img src="' + f.url + '" alt="" style="max-width:100%">';
                return '<div class="media-item cursor-pointer rounded-xl border border-automotive-100 overflow-hidden hover:border-safety transition-all aspect-square bg-automotive-50" data-code="' + escapeHtml(code) + '">' + tag + '</div>';
            }).join('');

            document.querySelectorAll('.media-item').forEach(el => {
                el.addEventListener('click', function() {
                    const ta = document.getElementById('productDescription');
                    const code = this.dataset.code;
                    ta.value = ta.value + '\n' + code;
                    overlay.remove();
                });
            });
        });
});

function escapeHtml(str) {
    const div = document.createElement('div');
    div.textContent = str;
    return div.innerHTML;
}

// Image preview
document.getElementById('imageFile')?.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('image-preview');
            preview.innerHTML = '<img src="' + e.target.result + '" class="w-full h-full object-cover">';
            preview.classList.remove('border-dashed', 'border-automotive-200');
        };
        reader.readAsDataURL(file);
    }
});
document.getElementById('imageUrl')?.addEventListener('input', function() {
    if (this.value) {
        const preview = document.getElementById('image-preview');
        preview.innerHTML = '<img src="' + this.value + '" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML=\'<svg class=\\\'w-8 h-8 text-automotive-300\\\' fill=\\\'none\\\' stroke=\\\'currentColor\\\' viewBox=\\\'0 0 24 24\\\'><path stroke-linecap=\\\'round\\\' stroke-linejoin=\\\'round\\\' stroke-width=\\\'2\\\' d=\\\'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z\\\'/></svg>\'">';
        preview.classList.remove('border-dashed', 'border-automotive-200');
    }
});

document.addEventListener('change', function(e) {
    if (e.target.id === 'modalFileUpload') {
        const file = e.target.files[0];
        if (!file) return;
        const formData = new FormData();
        formData.append('file', file);
        formData.append('folder', 'descriptions');
        formData.append('_token', '{{ csrf_token() }}');
        const btn = e.target.closest('label');
        btn.innerHTML = '<svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg> <span class="text-sm">Uploading...</span>';
        fetch('{{ route("admin.media.upload") }}', { method: 'POST', body: formData })
            .then(r => r.json())
            .then(data => {
                if (data.url) {
                    const ta = document.getElementById('productDescription');
                    const isVideo = data.name.match(/\.(mp4|webm|ogg)$/i);
                    const code = isVideo ? '<video controls><source src="' + data.url + '" type="video/mp4"></video>' : '<img src="' + data.url + '" alt="" style="max-width:100%">';
                    ta.value = ta.value + '\n' + code;
                    document.getElementById('media-modal')?.remove();
                }
            })
            .catch(() => { alert('Upload failed'); document.getElementById('media-modal')?.remove(); });
    }
});

// Gallery images upload
const galleryInput = document.getElementById('galleryInput');
const galleryUrls = JSON.parse(galleryInput?.value || '[]').filter(Boolean);
const galleryError = document.createElement('div');
galleryError.className = 'mt-2 text-xs text-red-600 hidden';
document.getElementById('gallery-preview')?.after(galleryError);

document.getElementById('galleryFiles')?.addEventListener('change', function() {
    const files = Array.from(this.files);
    const preview = document.getElementById('gallery-preview');
    const input = document.getElementById('galleryInput');
    galleryError.classList.add('hidden');
    let pending = files.length;
    files.forEach(file => {
        const formData = new FormData();
        formData.append('file', file);
        formData.append('folder', 'products');
        formData.append('_token', '{{ csrf_token() }}');
        fetch('{{ route("admin.media.upload") }}', { method: 'POST', body: formData })
            .then(r => { if (!r.ok) throw new Error('Upload failed'); return r.json(); })
            .then(data => {
                if (data.url) {
                    const storeUrl = data.path || data.url;
                    galleryUrls.push(storeUrl);
                    input.value = JSON.stringify(galleryUrls);
                    const div = document.createElement('div');
                    div.className = 'gallery-item relative w-20 h-20 bg-automotive-100 rounded-xl border border-automotive-200 overflow-hidden group';
                    div.setAttribute('data-path', storeUrl);
                    div.innerHTML = '<img src="' + data.url + '" class="w-full h-full object-cover"><button type="button" class="absolute top-1 right-1 w-5 h-5 bg-cta/90 hover:bg-cta rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity" onclick="removeGalleryItem(this)"><svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>';
                    preview.appendChild(div);
                }
            })
            .catch(e => {
                galleryError.textContent = 'Upload failed: ' + (e.message || 'server error');
                galleryError.classList.remove('hidden');
            })
            .finally(() => { pending--; if (!pending) document.getElementById('galleryFiles').value = ''; });
    });
});

window.removeGalleryItem = function(btn) {
    const item = btn.closest('.gallery-item');
    const path = item.getAttribute('data-path') || '';
    const idx = galleryUrls.indexOf(path);
    if (idx > -1) galleryUrls.splice(idx, 1);
    document.getElementById('galleryInput').value = JSON.stringify(galleryUrls);
    item.remove();
};

document.getElementById('generateAiBtn')?.addEventListener('click', function() {
    const name = document.getElementById('productName')?.value.trim();
    const brand = document.getElementById('productBrand')?.value.trim();
    const category = document.getElementById('categoryId')?.value;
    const price = document.getElementById('productPrice')?.value;
    const keywords = document.getElementById('aiKeywords')?.value.trim();
    const errorEl = document.getElementById('ai-error');
    const successEl = document.getElementById('ai-success');
    const loader = document.getElementById('ai-loader');
    const icon = document.getElementById('ai-icon');
    const btnText = document.getElementById('ai-btn-text');

    errorEl.classList.add('hidden');
    successEl.classList.add('hidden');

    if (!name && !keywords) {
        errorEl.className = 'mt-2 p-2.5 bg-red-50 border border-red-200 rounded-lg text-red-600 text-xs flex items-center gap-2';
        errorEl.innerHTML = '<svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg> Enter a product name or keywords to generate.';
        errorEl.classList.remove('hidden');
        (name ? document.getElementById('productName') : document.getElementById('aiKeywords'))?.focus();
        return;
    }

    this.disabled = true;
    loader.classList.remove('hidden');
    icon.classList.add('hidden');
    btnText.textContent = 'Generating...';

    fetch('{{ route("admin.ai.generate") }}', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        body: JSON.stringify({ name, brand, category_id: category, price, keywords })
    })
    .then(r => {
        if (!r.ok) {
            return r.json().then(err => { throw new Error(err.message || err.errors?.name?.[0] || 'Server error'); }).catch(() => { throw new Error('Server error (' + r.status + ')'); });
        }
        return r.json();
    })
    .then(data => {
        let filled = 0;
        if (data.description) { document.getElementById('productDescription').value = data.description; filled++; }
        if (data.specifications) { document.getElementById('productSpecs').value = data.specifications; filled++; }


        successEl.className = 'mt-2 p-2.5 bg-green-50 border border-green-200 rounded-lg text-green-700 text-xs flex items-center gap-2';
        successEl.innerHTML = '<svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg> Done! ' + filled + ' field' + (filled > 1 ? 's' : '') + ' populated.';
        successEl.classList.remove('hidden');
        setTimeout(() => { successEl.classList.add('hidden'); }, 5000);
    })
    .catch(e => {
        errorEl.className = 'mt-2 p-2.5 bg-red-50 border border-red-200 rounded-lg text-red-600 text-xs flex items-center gap-2';
        errorEl.innerHTML = '<svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg> ' + e.message;
        errorEl.classList.remove('hidden');
    })
    .finally(() => {
        this.disabled = false;
        loader.classList.add('hidden');
        icon.classList.remove('hidden');
        btnText.textContent = 'Generate';
    });
});
</script>
@endpush

@endsection
