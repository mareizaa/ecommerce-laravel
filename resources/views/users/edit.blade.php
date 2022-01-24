<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
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

                    <form action="{{ route('users.update', $user->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="flex flex-wrap">
                            <div class="w-1/2 p-4">
                                <div>
                                    <x-label for="name" :value="__('Name')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="name"
                                            value="{{ old('name', $user->name) }}"></x-input>
                                </div>
                                <div>
                                <x-label for="email" :value="__('Email')"></x-label>
                                <x-input class="block mt-1 w-full" type="email" name="email"
                                            value="{{ old('email', $user->email) }}"></x-input>
                                </div>
                            </div>
                            <div class="w-1/2 p-4">
                                <div>
                                    <x-label for="password" :value="__('New password')"></x-label>
                                    <x-input class="block mt-1 w-full" type="password"
                                            name="password" autocomplete="new-password"></x-input>
                                </div>
                                <div>
                                    <x-label for="password_confirmation" :value="__('Confirm password')"></x-label>
                                    <x-input class="block mt-1 w-full" type="password"
                                            name="password_confirmation"></x-input>
                                </div>
                            </div>
                            <div class="w-1/2 p-4">
                                <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.1.0/dist/flowbite.min.css" />
                                <label for="status" class="flex items-center cursor-pointer relative">
                                    <input type="checkbox" name="status" id="status" class="sr-only" {{ $user->status ? 'checked': '' }} value="{{  $user->status = 'checked' ? '1': '0' }}">
                                    <div class="toggle-bg bg-gray-200 border-2 border-gray-200 h-6 w-11 rounded-full"></div>
                                    <span class="ml-3 text-gray-900 text-sm font-medium">Status</span>
                                </label>
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
