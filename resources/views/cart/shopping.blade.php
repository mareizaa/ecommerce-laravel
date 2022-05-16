<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="container p-8 mx-auto bg-white">
                        <div class="w-full overflow-x-auto">
                          <div class="my-2">
                            <h3 class="text-xl font-bold tracking-wider">Shopping Cart</h3>
                          </div>
                          <table class="w-full shadow-inner">
                            <thead>
                              <tr class="bg-gray-100">
                                <th class="px-6 py-3 font-bold whitespace-nowrap">Product</th>
                                <th class="px-6 py-3 font-bold whitespace-nowrap">Qty</th>
                                <th class="px-6 py-3 font-bold whitespace-nowrap">Price</th>
                                <th class="px-6 py-3 font-bold whitespace-nowrap">Remove</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($items as $item )
                                <tr>
                                    <td class="p-4 px-6 text-center whitespace-nowrap"> {{ $item->name }}</td>
                                    <td class="p-4 px-6 text-center whitespace-nowrap">{{ $item['pivot']['quantity'] }}</td>
                                    <td class="p-4 px-6 text-center whitespace-nowrap">{{ $item['pivot']['amount'] }}</td>
                                    <td class="p-4 px-6 text-center whitespace-nowrap">
                                      <button class="px-2 py-0 text-red-100 bg-red-600 rounded">
                                        x
                                      </button>
                                    </td>
                                </tr>
                            @endforeach
                              </tr>
                            </tbody>
                          </table>
                          <div class="flex justify-end mt-4 space-x-2">
                            <div class="p-4 px-6 font-bold text-gray-900" >
                              Total - $ {{ $order->total}}
                            </div>
                            <button class="px-6 text-sm text-white bg-indigo-500 hover:bg-indigo-600">
                                <a href="webcheckout" type="button">Proceed to Checkout</a>
                            </button>
                          </div>
                        </div>
                      </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
