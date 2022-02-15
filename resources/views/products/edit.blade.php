<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors"></x-auth-validation-errors>

                    <!-- Succes Message -->
                    <x-success-message class="mb-4" :errors="$errors"></x-success-message>

                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="flex flex-wrap">
                            <div class="w-1/2 p-4">
                                <div>
                                    <x-label for="name" :value="__('Name')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="name" value="{{ old('name', $product->name) }}"></x-input>
                                </div>
                                <div>
                                    <x-label for="description" :value="__('Description')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="description" value="{{ old('description', $product->description) }}"></x-input>
                                </div>
                                <div>
                                    <x-label for="price" :value="__('Price')"></x-label>
                                    <x-input class="block mt-1 w-full" type="number" name="price" value="{{ old('price', $product->price) }}"></x-input>
                                </div>
                            </div>
                            <div class="w-1/2 p-4">
                                <div>
                                    <x-label for="quantity" :value="__('Quantity')"></x-label>
                                    <x-input class="block mt-1 w-full" type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}"></x-input>
                                </div>
                                <div class="flex items-center justify-center bg-grey-lighter mt-6">
                                    <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-[#0e7490] cursor-pointer hover:bg-[#0e7490] hover:text-white">
                                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                        </svg>
                                        <span class="mt-2 text-base leading-normal">Select a file</span>
                                        <input for="images" type='file' class="hidden" name="images" accept="image/*"/>
                                    </label>
                                </div>
                                <div class="w-1/2 p-4">
                                    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.1.0/dist/flowbite.min.css" />
                                    <label for="status" class="flex items-center cursor-pointer relative">
                                        <input type="hidden" name="status" class="sr-only" value="0">
                                        <input type="checkbox" name="status" id="status" class="sr-only" {{ $product->status ? 'checked': '' }} value="1">
                                        <div class="toggle-bg bg-gray-200 border-2 border-gray-200 h-6 w-11 rounded-full"></div>
                                        <span class="ml-3 text-gray-900 text-sm font-medium">Status</span>
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                Edit
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
