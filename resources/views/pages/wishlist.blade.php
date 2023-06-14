<x-layout>
    <!-- wrapper -->
    <div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">


        <x-account-sidebar/>

        <!-- wishlist -->

        <div class="col-span-9 space-y-4">
            <h1>My Wishlist</h1>

            @foreach ($wishlist as $wishlist)
            @php $product = $wishlist->product @endphp
                <x-user-product-list :product='$product'>
                    <form action="/cart" method="POST">
                        @csrf
                        <input hidden name='user_id' value="{{ auth()->id() }}">
                        <input hidden name='product_id' value="{{ $product->id }}">
                        <button class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">
                            add to cart
                        </button>
                    </form>
                    <form action="/wishlist/{{ $wishlist->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-gray-600 cursor-pointer hover:text-primary">
                            <i class="fa-solid fa-x"></i>
                        </button>
                    </form>
                </x-user-product-list>
            @endforeach


        </div>
        <!-- ./wishlist -->

    </div>
    <!-- ./wrapper -->
</x-layout>
