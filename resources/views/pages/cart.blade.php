<x-layout>
    <!-- wrapper -->
<div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">


    <x-account-sidebar/>

    <!-- cart -->

    <div class="col-span-9 space-y-4">
        <h1>My Cart</h1>

        @foreach ($cart_items as $product)
        <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
            <div class="w-28">
                <img src="{{ asset('/storage' . $product->logo) }}" alt="{{ $product->logo }}" class="w-full">
            </div>
            <div class="w-1/3">
                <h2 class="text-gray-800 text-xl font-medium uppercase">{{ $product->name }}</h2>
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
                    </span></p>
            </div>
            <div class="text-primary text-lg font-semibold">${{ $product->price }}.00</div>
            <a href="/cart/{{ auth()->user()->id }}/add/{{ $product->id }}"
            class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">add
            to cart</a>

            <div class="text-gray-600 cursor-pointer hover:text-primary">
                <i class="fa-solid fa-trash"></i>
            </div>
        </div>
        @endforeach

    </div>
    <!-- ./cart -->

</div>
<!-- ./wrapper -->
</x-layout>
