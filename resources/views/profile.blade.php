<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <!-- Succes Message -->
                    <x-success-message class="mb-4" :errors="$errors"></x-success-message>

                    <form class="flex justify-center" action="{{ route('profile.update')}}" method="post">
                        @csrf
                        @method('PUT')
                        <div>
                            <div class="flex flex-row">
                                <div>
                                    <x-label for="name" :value="__('Name')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="name"
                                            value="{{ auth()->user()->name }}" autofocus></x-input>
                                </div>
                                <div class="px-6">
                                    <x-label for="email" :value="__('Email')"></x-label>
                                    <x-input class="block mt-1 w-full" type="text" name="email"
                                            value="{{ auth()->user()->email }}"></x-input>
                                </div>
                            </div>
                            <div class="flex flex-row mt-6">
                                <div>
                                    <x-label for="password" :value="__('New password')"></x-label>
                                    <x-input class="block mt-1 w-full" type="password"
                                            name="password" autocomplete="new-password"></x-input>
                                </div>
                                <div class="px-6">
                                    <x-label for="password_confirmation" :value="__('Confirm password')"></x-label>
                                    <x-input class="block mt-1 w-full" type="password"
                                            name="password_confirmation"></x-input>
                                </div>
                            </div>
                            <div class="flex justify-center mt-4">
                                <x-button>
                                    Update
                                </x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
