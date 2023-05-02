<x-layout>
    <!-- wrapper -->
<div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">


    <x-account-sidebar/>

    <!-- cart -->

    <div class="col-span-9 space-y-4">
        <h1>My Cart</h1>

        @foreach ($cart as $cart)
        <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
            <div class="w-28">
                <img src="{{ asset('/storage' . $cart->product->logo) }}" alt="{{ $cart->product->logo }}" class="w-full">
            </div>
            <div class="w-1/3">
                <h2 class="text-gray-800 text-xl font-medium uppercase">{{ $cart->product->name }}</h2>
                <p class="text-gray-500 text-sm">Availability:
                    @if (($cart->product->size_xs + $cart->product->size_s + $cart->product->size_m + $cart->product->size_l + $cart->product->size_xl) > 0)
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
            <div class="text-primary text-lg font-semibold">${{ $cart->product->price }}.00</div>

            <div class="text-gray-600 cursor-pointer hover:text-primary">
                <form action="/cart/{{ auth()->user()->id }}/delete/{{ $cart->id }}" method="POST">
                    @csrf
                    <button type="submit" class="fa-solid fa-trash"></button>
                </form>
            </div>
        </div>
        @endforeach
        <button class="capitalize bg-primary p-2 text-white rounded-md">checkout({{ auth()->user()->cart->count() }})</button>
    </div>
    <!-- ./cart -->

</div>
<!-- ./wrapper -->
</x-layout>
