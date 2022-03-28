<x-app-layout>
    <div class="py-12 bg-gray-100" id="app">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-4 bg-white border-b border-gray-200">
                    <div class="max-w-2xl mx-auto px-4 sm:py-22 sm:px-6 lg:max-w-7xl lg:px-8">
                        <div class="flex justify-between items-center">
                            <div class="text-lg font-medium text-gray-900">
                                <h2>Products</h2>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                            @foreach ($products as $product)
                                <div>
                                    <div class="w-full h-80 aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                        <a href="{{ route('products.show', $product->id) }}" class="group">
                                            @foreach ($product->image as $image)
                                                <img src="{{ asset('storage/images/'.$product->id.'/'.$image->image_name) }}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="w-full h-full object-center object-cover group-hover:opacity-75">
                                            @endforeach
                                        </a>
                                    </div>
                                    <div class="flex justify-between">
                                        <div>
                                            <h3 class="mt-4 text-sm text-gray-700">{{ $product->name }}</h3>
                                            <p class="mt-1 text-lg font-medium text-gray-900">${{ $product->price }}</p>
                                        </div>
                                        <div>
                                            <button class="mt-4 bg-yellow-300 opacity-75 hover:opacity-100 text-yellow-900 hover:text-gray-900 rounded-full px-10 py-2 font-semibold" @click="count++"><i class="mdi mdi-cart -ml-2 mr-2"></i> BUY NOW</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-4">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
