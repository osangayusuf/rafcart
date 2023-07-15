<x-layout>
        <!-- breadcrumb -->
        <div class="container py-4 flex items-center gap-3">
            <a href="/" class="text-primary text-base">
                <i class="fa-solid fa-house"></i>
            </a>
            <span class="text-sm text-gray-400">
                <i class="fa-solid fa-chevron-right"></i>
            </span>
            <p class="text-gray-600 font-medium">Shop</p>
        </div>

        <!-- ./breadcrumb -->

        <!-- shop wrapper -->
        <div class="container grid grid-cols-4 gap-6 pt-4 pb-16 items-start">

            <x-shop-sidebar :brands='$brands' :categories='$categories'/>

            <!-- products -->
            <div class="col-span-3">
                <div class="flex items-center mb-4">
                    <select name="sort" id="sort"
                        class="w-44 text-sm text-gray-600 py-3 px-4 border-gray-300 shadow-sm rounded focus:ring-primary focus:border-primary">
                        <option value="">Default sorting</option>
                        <option value="price-low-to-high">Price low to high</option>
                        <option value="price-high-to-low">Price high to low</option>
                        <option value="latest">Latest product</option>
                    </select>

                    <div class="flex gap-2 ml-auto">
                        <div
                            class="border border-primary w-10 h-9 flex items-center justify-center text-white bg-primary rounded cursor-pointer">
                            <i class="fa-solid fa-grip-vertical"></i>
                        </div>
                        <div
                            class="border border-gray-300 w-10 h-9 flex items-center justify-center text-gray-600 rounded cursor-pointer">
                            <i class="fa-solid fa-list"></i>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-6">
                    @unless(count($products)==0)
                    @foreach ($products as $product)
                        <x-product-card :product='$product'/>
                    @endforeach
                    @else
                    <h1>No products</h1>
                    @endunless
                </div>
                <div class="mt-10">
                    {{$products->links()}}
                </div>
            </div>
            <!-- ./products -->
        </div>
        <!-- ./shop wrapper -->

</x-layout>

