<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Show Product -->
                    <style>@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);</style>
                    <div class="min-w-screen min-h-screen flex items-center p-5 lg:p-10 overflow-hidden relative">
                        <div class="w-full max-w-6xl rounded bg-white p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
                            <div class="md:flex items-center -mx-10">
                                <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
                                    <div class="relative">
                                        @foreach ($product->image as $image)
                                            <img src="{{ asset('storage/images/'.$product->id.'/'.$image->image_name) }}" class="rounded bg-white shadow-xl w-full relative z-10" alt="">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2 px-10">
                                    <div class="mb-10">
                                        <h1 class="font-bold uppercase text-2xl mb-5">{{ $product->name }}</h1>
                                        <p class="text-sm">{{ $product->description }}</p>
                                    </div>
                                    <div>
                                        <div class="inline-block align-bottom mr-5">
                                            <span class="text-2xl leading-none align-baseline">$</span>
                                            <span class="font-bold text-5xl leading-none align-baseline">{{ $product->price }}</span>
                                        </div>
                                        <div class="inline-block align-bottom">
                                            <button class="bg-yellow-300 opacity-75 hover:opacity-100 text-yellow-900 hover:text-gray-900 rounded-full px-10 py-2 font-semibold"><i class="mdi mdi-cart -ml-2 mr-2"></i> BUY NOW</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
