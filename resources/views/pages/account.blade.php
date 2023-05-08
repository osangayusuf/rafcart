<x-layout>
        <!-- account wrapper -->
        <div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">

            <x-account-sidebar/>

            <!-- info -->
            <div class="col-span-9 grid grid-cols-3 gap-4">

                <div class="shadow rounded bg-white px-4 pt-6 pb-8">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-medium text-gray-800 text-lg">Personal Profile</h3>
                        <a href="#" class="text-primary">Edit</a>
                    </div>
                    <div class="space-y-1">
                        <h4 class="text-gray-700 font-medium">{{$user->name}}</h4>
                        <p class="text-gray-800">{{$user->email}}</p>
                        <p class="text-gray-800">Phone Number</p>
                    </div>
                </div>

                <div class="shadow rounded bg-white px-4 pt-6 pb-8">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-medium text-gray-800 text-lg">Shipping address</h3>
                        <a href="#" class="text-primary">Edit</a>
                    </div>
                    <div class="space-y-1">
                        <h4 class="text-gray-700 font-medium">Name</h4>
                        <p class="text-gray-800">Address</p>
                        <p class="text-gray-800">Postal code</p>
                        <p class="text-gray-800">Phone Number</p>
                    </div>
                </div>

                <div class="shadow rounded bg-white px-4 pt-6 pb-8">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-medium text-gray-800 text-lg">Billing address</h3>
                        <a href="#" class="text-primary">Edit</a>
                    </div>
                    <div class="space-y-1">
                        <h4 class="text-gray-700 font-medium">Name</h4>
                        <p class="text-gray-800">Address</p>
                        <p class="text-gray-800">Postal code</p>
                        <p class="text-gray-800">Phone Number</p>
                    </div>
                </div>

            </div>
            <!-- ./info -->

        </div>
        <!-- ./account wrapper -->
</x-layout>
