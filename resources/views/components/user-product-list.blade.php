<div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
    <div class="w-28">
        <img src="{{ asset('/storage' . $product->logo) }}" alt="{{ $product->logo }}" class="w-full">
    </div>
    <div class="w-1/3">
        <a href="/product/{{ $product->id }}" class="text-gray-800 text-xl font-medium uppercase">{{ $product->name }}</a>
        <p class="text-gray-500 text-sm">Availability:
            @if (($product->size_xs + $product->size_s + $product->size_m + $product->size_l + $product->size_xl) > 0)
            <span class="text-green-600">
                In Stock
            </span>
            @else
            <span class="text-red-600">
                Out of stock
            </span>
            @endif
        </p>
    </div>
    <div class="text-primary text-lg font-semibold">${{ $product->price }}.00</div>
    {{ $slot }}

</div>
