@props(['products'])
<!-- new arrival -->
<div class="container pb-16">
    <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">top new arrival</h2>
    <div class="grid grid-cols-4 gap-6">
        @foreach ($products as $product)
        <x-product-card :product="$product" />
        @endforeach
    </div>
</div>
<!-- ./new arrival -->
