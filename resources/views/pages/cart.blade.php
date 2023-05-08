<x-layout>
    <!-- wrapper -->
<div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">


    <x-account-sidebar/>

    <!-- cart -->

    <div class="col-span-9 space-y-4">
        <h1>My Cart</h1>
        @foreach ($cart as $cart)
        @php $product = $cart->product @endphp
        <x-user-product-list :product='$product'>
        <form action="/cart/{{ $cart->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-gray-600 cursor-pointer hover:text-primary">
                <i class="fa-solid fa-trash"></i>
            </button>
        </form>
        </x-user-product-list>
        @endforeach
        <button class="capitalize bg-primary p-2 text-white rounded-md">checkout({{ $user->cart_count }})</button>
    </div>
    <!-- ./cart -->

</div>
<!-- ./wrapper -->
</x-layout>
