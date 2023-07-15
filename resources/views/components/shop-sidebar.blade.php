            @props(['categories', 'brands'])

        <form method="GET" action="/shop">
            <!-- sidebar -->
            <div class="col-span-1 bg-white px-4 pb-6 shadow rounded overflow-hidden">
                <div class="divide-y divide-gray-200 space-y-5">
                    <div>
                        <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Categories</h3>
                        <div class="space-y-2">
                            @foreach ($categories as $category)
                            <div class="flex items-center">
                                <input type="checkbox" name="category[]" value="{{$category->id}}" id="{{$category->name}}"
                                    class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                                <label for="{{$category->name}}" class="text-gray-600 ml-3 cusror-pointer capitalize">{{$category->name}}</label>
                                <div class="ml-auto text-gray-600 text-sm">({{$category->products_count}})</div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="pt-4">
                        <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Brands</h3>
                        <div class="space-y-2">
                            @foreach ($brands as $brand)
                            <div class="flex items-center">
                                <input type="checkbox" name="brand[]" value="{{$brand->brand}}" id="{{$brand->brand}}"
                                    class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                                <label for="{{$brand->brand}}" class="text-gray-600 ml-3 cusror-pointer capitalize">{{$brand->brand}}</label>
                                <div class="ml-auto text-gray-600 text-sm">(15)</div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="pt-4">
                        <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Price</h3>
                        <div class="mt-4 flex items-center">
                            <input type="text" name="min" id="min"
                                class="w-full border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                                placeholder="min">
                            <span class="mx-3 text-gray-500">-</span>
                            <input type="text" name="max" id="max"
                                class="w-full border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                                placeholder="max">
                        </div>
                    </div>

                    <div class="pt-4">
                        <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">size</h3>
                        <div class="flex items-center gap-2">
                            <div class="size-selector">
                                <input type="radio" name="size[]" id="size-xs" class="hidden" value="size_xs">
                                <label for="size-xs"
                                    class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">XS</label>
                            </div>
                            <div class="size-selector">
                                <input type="radio" name="size[]" id="size-s" class="hidden" value="size_s">
                                <label for="size-s"
                                    class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">S</label>
                            </div>
                            <div class="size-selector">
                                <input type="radio" name="size[]" id="size-m" class="hidden" value="size_m">
                                <label for="size-m"
                                    class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">M</label>
                            </div>
                            <div class="size-selector">
                                <input type="radio" name="size[]" id="size-l" class="hidden" value="size_l">
                                <label for="size-l"
                                    class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">L</label>
                            </div>
                            <div class="size-selector">
                                <input type="radio" name="size[]" id="size-xl" class="hidden" value="size_xl">
                                <label for="size-xl"
                                    class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">XL</label>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="pt-4">
                        <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Color</h3>
                        <div class="flex items-center gap-2">
                            <div class="color-selector">
                                <input type="radio" name="color" id="red" class="hidden">
                                <label for="red"
                                    class="border border-gray-200 rounded-sm h-6 w-6  cursor-pointer shadow-sm block"
                                    style="background-color: #fc3d57;"></label>
                            </div>
                            <div class="color-selector">
                                <input type="radio" name="color" id="black" class="hidden">
                                <label for="black"
                                    class="border border-gray-200 rounded-sm h-6 w-6  cursor-pointer shadow-sm block"
                                    style="background-color: #000;"></label>
                            </div>
                            <div class="color-selector">
                                <input type="radio" name="color" id="white" class="hidden">
                                <label for="white"
                                    class="border border-gray-200 rounded-sm h-6 w-6  cursor-pointer shadow-sm block"
                                    style="background-color: #fff;"></label>
                            </div>
                        </div>
                    </div> --}}
                    <div>
                        <button type="submit"
                                class="w-full bg-primary text-white py-2 rounded-sm uppercase font-medium tracking-wider"
                                >
                            Filter
                        </button>
                    </div>

                </div>
            </div>
        </form>
            <!-- ./sidebar -->
