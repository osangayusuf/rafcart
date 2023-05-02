@props(['product'])

<div class="bg-white shadow rounded overflow-hidden group">
    <div class="relative">
        <img src="{{asset('storage/' . $product->logo)}}" alt="{{$product->name}}" class="w-full">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center
        justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
            <a href="/product/{{$product->id}}"
                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                title="View product">
                <i class="fa-solid fa-magnifying-glass"></i>
            </a>
            @auth
            <a href="/cart/{{ auth()->user()->id }}/add/{{ $product->id }}"
                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                title="Add to cart">
                <i class="fa-solid fa-shopping-cart"></i>
            </a>

            <a href="/wishlist/{{ auth()->user()->id }}/add/{{ $product->id }}"
                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                title="Add to wishlist">
                <i class="fa-solid fa-heart"></i>
            </a>
            @endauth
        </div>
    </div>
    <div class="pt-4 pb-3 px-4">
        <a href="#">
            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                {{$product->name}}
            </h4>
        </a>
        <div class="flex items-baseline mb-1 space-x-2">
            <p class="text-xl text-primary font-semibold">${{$product->price}}</p>
            <p class="text-sm text-gray-400 line-through">${{$product->price*1.25}}</p>
        </div>
        <div class="flex items-center">
            <div class="flex gap-1 text-sm">
                <span class="text-yellow-400"><i class="fa-solid fa-star"></i></span>
                <span class="text-gray-400"><i class="fa-solid fa-star"></i></span>
            </div>
            <div class="text-xs text-gray-500 ml-3">(150)</div>
        </div>
    </div>
    @auth
    <a href="/cart/{{ auth()->user()->id }}/add/{{ $product->id }}"
        class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
        to cart
    </a>
    @endauth
</div>

