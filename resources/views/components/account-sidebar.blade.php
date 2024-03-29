        <!-- sidebar -->
        <div class="col-span-3">
            <div class="px-4 py-3 shadow flex items-center gap-4">
                <div class="flex-shrink-0">
                    @if(isset(auth()->user()->profile_image))
                        <img src="{{ asset('storage/profile-images/' . auth()->user()->profile_image)  }}" alt="profile"
                            class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover">
                    @else
                        <img src="{{ asset('storage/images/no_image.jpeg') }}" alt="profile"
                            class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover">
                    @endif
                </div>
                <div class="flex-grow">
                    <p class="text-gray-600">Hello,</p>
                    <h4 class="text-gray-800 font-medium">{{ auth()->user()->name }}</h4>
                </div>
            </div>

            <div class="mt-6 bg-white shadow rounded p-4 divide-y divide-gray-200 space-y-4 text-gray-600">
                <div class="space-y-1 pl-8">
                    <a href="/account/{{ auth()->id() }}" class=@if(Route::currentRouteName() == 'account') "text-primary @endif block font-medium capitalize transition">
                        <span class="absolute -left-8 top-0 text-base">
                            <i class="fa-regular fa-user"></i>
                        </span>
                        Manage account
                    </a>
                    <a href="/account/{{ auth()->id() }}" class="relative hover:text-primary block capitalize transition">
                        Profile information
                    </a>
                    <a href="#" class="relative hover:text-primary block capitalize transition">
                        Manage addresses
                    </a>
                    <a href="#" class="relative hover:text-primary block capitalize transition">
                        Change password
                    </a>
                </div>

                <div class="space-y-1 pl-8 pt-4">
                    <a href="#" class="relative hover:text-primary block font-medium capitalize transition">
                        <span class="absolute -left-8 top-0 text-base">
                            <i class="fa-solid fa-box-archive"></i>
                        </span>
                        My order history
                    </a>
                    <a href="#" class="relative hover:text-primary block capitalize transition">
                        My returns
                    </a>
                    <a href="#" class="relative hover:text-primary block capitalize transition">
                        My Cancellations
                    </a>
                    <a href="#" class="relative hover:text-primary block capitalize transition">
                        My reviews
                    </a>
                </div>

                <div class="space-y-1 pl-8 pt-4">
                    <a href="#" class="relative hover:text-primary block font-medium capitalize transition">
                        <span class="absolute -left-8 top-0 text-base">
                            <i class="fa-regular fa-credit-card"></i>
                        </span>
                        Payment methods
                    </a>
                    <a href="#" class="relative hover:text-primary block capitalize transition">
                        voucher
                    </a>
                </div>

                <div class="space-y-1 pl-8 pt-4">
                    <a href="/wishlist" class=@if(Route::currentRouteName() == 'wishlist.index') "text-primary @endif relative block font-medium capitalize transition">
                        <span class="absolute -left-8 top-0 text-base">
                            <i class="fa-regular fa-heart"></i>
                        </span>
                        My wishlist
                    </a>
                </div>

                <div class="space-y-1 pl-8 pt-4">
                    <a href="/cart" class=@if(Route::currentRouteName() == 'cart.index') "text-primary @endif relative block font-medium capitalize transition">
                        <span class="absolute -left-8 top-0 text-base">
                            <i class="fa-regular fa-bag-shopping"></i>
                        </span>
                        My Cart
                    </a>
                </div>

                <div class="space-y-1 pl-8 pt-4">
                    <a href="#" class="relative hover:text-primary block font-medium capitalize transition">
                        <span class="absolute -left-8 top-0 text-base">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </span>
                        Logout
                    </a>
                </div>

            </div>
        </div>
        <!-- ./sidebar -->
