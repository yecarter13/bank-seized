@extends('admin.layouts.master')

@section('title', $category ? 'Edit Category' : 'New Category')

@section('content')
<a href="{{ route('admin.categories.index') }}" class="text-automotive-400 hover:text-automotive-600 text-sm transition-colors">&larr; Back to Categories</a>

<form action="{{ $category ? route('admin.categories.update', $category) : route('admin.categories.store') }}" method="POST" class="mt-4 bg-white rounded-xl border border-automotive-100 p-6 max-w-2xl">
    @csrf
    @if($category) @method('PUT') @endif

    <div class="mb-4">
        <label class="block text-sm font-medium text-automotive-900 mb-1.5">Category Name</label>
        <input type="text" name="name" value="{{ old('name', $category?->name) }}" required class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all">
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-automotive-900 mb-1.5">Description</label>
        <textarea name="description" rows="3" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all">{{ old('description', $category?->description) }}</textarea>
    </div>

    <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
            <label class="block text-sm font-medium text-automotive-900 mb-1.5">Image (filename)</label>
            <input type="text" name="image" value="{{ old('image', $category?->image) }}" placeholder="e.g. brakes.png" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all">
        </div>
        <div>
            <label class="block text-sm font-medium text-automotive-900 mb-1.5">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $category?->sort_order ?? 0) }}" min="0" class="w-full px-4 py-2.5 border border-automotive-200 rounded-xl text-sm focus:outline-none focus:border-safety transition-all">
        </div>
    </div>

    <div class="mb-6">
        <label class="flex items-center gap-2">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $category?->is_active ?? true) ? 'checked' : '' }} class="rounded border-automotive-300 text-safety focus:ring-safety">
            <span class="text-sm text-automotive-700">Active</span>
        </label>
    </div>

    <button type="submit" class="px-6 py-2.5 bg-safety hover:bg-safety-dark text-white font-semibold rounded-lg text-sm transition-all duration-200">
        {{ $category ? 'Update Category' : 'Create Category' }}
    </button>
</form>
@endsection
