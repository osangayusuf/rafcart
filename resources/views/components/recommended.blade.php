    @props(['recommended'])
    <!-- recommended -->
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">recomended for you</h2>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($recommended as $product)
            <x-product-card :product="$product" />
            @endforeach
        </div>
    </div>
    <!-- ./recommended -->
