<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Table show Products -->
                    <div class="flex flex-col ">
                      <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="flex flex-row">
                                <a href="{{ route('products.create') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                    Create New Product
                                </a>
                                <a href="{{ route('products.export.process') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                    Export Products
                                </a>
                                <form action="{{ route('products.import.process') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="flex flex-row">
                                        <button class="bg-transparent hover:bg-blue-500 flex text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="submit">
                                             <svg fill="#FFF" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z"/>
                                            </svg>
                                            <span class="flex">Import Products</span>
                                            <input
                                            class=""
                                            type="file"
                                            name="file"
                                        >
                                        </button>

                                    </div>
                                </form>
                            </div>
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mt-4">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Image
                                            </th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Description
                                            </th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Price
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Quantity
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Status
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($products as $product)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                      <div>
                                                        <div class="text-sm font-medium text-gray-900">
                                                            @foreach ($product->image as $image)
                                                                @if (Storage::disk(config('filesystems.images_disk'))->exists($product->id.'/'.$image->image_name))
                                                                    <img class="w-full h-12 w-12 rounded" src="{{ asset('storage/images/'.$product->id.'/'.$image->image_name) }} "alt="">
                                                                @else
                                                                    <img class="w-full h-12 w-12 rounded" src="{{ asset('img/imagedefault.jpg')}} "alt="">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                  <div class="flex items-center">
                                                    <div>
                                                      <div class="text-sm font-medium text-gray-900">
                                                          {{ $product->name }}
                                                      </div>
                                                    </div>
                                                  </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-900">
                                                        {{ $product->description }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-900">
                                                        {{ $product->price }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-900">
                                                        {{ $product->quantity }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-900">
                                                        @if ( $product->status )
                                                            Active
                                                        @else
                                                            Inactive
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                    <a href="{{ url("products/{$product->id}/edit") }}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                          <!-- Pagination -->
                          <div class="mt-4">
                            {{ $products->links() }}
                          </div>

                        </div>
                      </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
