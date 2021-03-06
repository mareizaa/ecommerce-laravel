<div>
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <div class="flex flex-row cursor-pointer truncate p-2 px-4  rounded">
                <div class="flex flex-row-reverse ml-2 w-full">
                    <div slot="icon" class="relative" wire:click="setProducts"">
                        <div class="absolute text-xs rounded-full -mt-1 -mr-2 px-1 font-bold top-0 right-0 bg-red-700 text-white">{{ $count }}</div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart w-6 h-6 mt-2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="content">
            @if ($products)
                @foreach ( $products as $product )
                <div class="p-2 flex bg-white hover:bg-gray-100 cursor-pointer border-b border-gray-100" style="">
                    <div class="flex-auto text-sm w-32">
                        <div class="font-bold">
                                <p>{{ $product['name'] }}</p>
                        </div>
                        <div class="text-gray-600">{{ $product['quantity'] }}</div>
                    </div>
                    <div class="flex flex-col w-18 font-medium items-end">
                        <div class="w-4 h-4 mb-1 hover:bg-red-200 rounded-full cursor-pointer text-red-700" wire:click="deleteProduct">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 ">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg>
                        </div>
                        <div class="text-gray-600">${{ $product['amount'] }}</div>
                    </div>
                </div>
                @endforeach
                <x-dropdown-link :href="route('cart.shopping')">
                    <button class="text-base  undefined  hover:scale-110 focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer
                    hover:bg-teal-700 hover:text-teal-100
                    bg-teal-100
                    text-teal-700
                    border duration-200 ease-in-out
                    border-teal-600 transition">Chekout ${{ $total }}</button>
                </x-dropdown-link>
            @else
                <p> No tienes productos en tu carrito </p>
            @endif
            </form>
        </x-slot>
    </x-dropdown>
</div>

