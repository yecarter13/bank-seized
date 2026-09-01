{{-- Expects $product --}}
<button onclick="event.stopPropagation(); addToCart({{ $product->id }}, 1, this)" class="px-3 py-1.5 bg-safety hover:bg-safety-dark text-white text-[10px] font-semibold rounded-lg transition-all duration-200 whitespace-nowrap">Add to Cart</button>
