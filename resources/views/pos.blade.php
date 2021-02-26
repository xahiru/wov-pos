<x-app-layout>
        <!-- main wrapper -->

        <div class="h-screen md:container mx-auto grid grid-cols-6 grid-rows-2">

                <!-- register -->
                <div class="row-span-2 col-span-2 bg-gray-600">
                        register
                        register

                        registerregisterregisterregisterrerregisterregisterregisterregisterregisterregisterregisterregisterregisterregisterregister
                        register
                        register
                        register

                        register

                        register

                </div>
                <div class="col-span-4 bg-pink-300" > 
                        <!-- catogory picker -->
                        <div class="bg-pink-300 overflow-y-auto flex flex-wrap" style="height: 100px;">
                                @foreach ($catergories as $cat)
                                <span class="max-w-md m-2 px-10 py-12 bg-white rounded-lg shadow-lg">{{$cat->name}}</span>
                                @endforeach
                        </div>
                        <!-- products listing -->

                        <div class="flex flex-wrap bg-yellow-300">
                                
                                @foreach ($products as $product)

                                @livewire('x-jet-product', [ 'product'=> $product])

                                @endforeach
                        </div>
                </div>
                


                <!-- footer action bar  -->
                <div class="col-span-6 bg-green-300" style="height: 100px;">
                        footer action buttons
                </div>


        </div>

</x-app-layout>