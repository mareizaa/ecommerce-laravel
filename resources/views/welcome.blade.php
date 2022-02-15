<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-center h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('welcome') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 166.632 36" width="166.632" height="36">
                                    <g fill="#0e6458" color="#0e6458" transform="translate(0 4.291666666666666) scale(0.5833334)">
                                        <svg width="48.0" height="47.0" x="0.0" y="0.0" viewBox="0 0 48 47">
                                            <path fill="currentColor" fill-rule="evenodd" d="M32.083 0l-.46.265-2.644 1.527-13.062 7.542L3.854 30.228.267 36.442l-.267.46 2.117 1.222 13.925 8.042.123.07H48V27.57l-.071-.124L34.953 4.97 32.083 0zM25.04 5.292l6.654-3.841 6.547 11.34-13.2-7.5zm-7.67 4.43l6.604-3.814 15.317 8.703 6.725 11.65-28.647-16.54zm-.531.92l29.566 17.07-29.566 17.07v-34.14zM9.171 40.97l-.123-17.615 6.728-11.65v33.078L9.17 40.97zm-7.72-4.457l6.547-11.338.107 15.18-6.654-3.842zm45.487-7.88v7.627l-15.194 8.912H18.29l28.648-16.54zm0 8.858v7.681H33.842l13.096-7.681zM23.567 22.294l9.384 5.42-9.384 5.417V22.294zm1.06 1.84v7.156l6.198-3.577-6.198-3.578z"></path></svg></g><path fill="#000000" fill-rule="nonzero" d="M15.74 5.09Q18.12 5.09 19.48 6.46Q20.83 7.82 20.83 10.49L20.83 10.49L20.83 17.81L19.13 17.81L19.13 10.66Q19.13 8.69 18.18 7.66Q17.23 6.62 15.50 6.62L15.50 6.62Q13.54 6.62 12.41 7.84Q11.28 9.05 11.28 11.18L11.28 11.18L11.28 17.81L9.58 17.81L9.58 10.66Q9.58 8.69 8.63 7.66Q7.68 6.62 5.93 6.62L5.93 6.62Q3.98 6.62 2.84 7.84Q1.70 9.05 1.70 11.18L1.70 11.18L1.70 17.81L0 17.81L0 5.18L1.63 5.18L1.63 7.49Q2.30 6.34 3.50 5.71Q4.70 5.09 6.26 5.09L6.26 5.09Q7.85 5.09 9.01 5.76Q10.18 6.43 10.75 7.75L10.75 7.75Q11.45 6.50 12.76 5.80Q14.06 5.09 15.74 5.09L15.74 5.09ZM30.91 16.42Q32.09 16.42 33.08 16.00Q34.08 15.58 34.78 14.76L34.78 14.76L35.74 15.86Q34.90 16.87 33.65 17.40Q32.40 17.93 30.89 17.93L30.89 17.93Q28.94 17.93 27.43 17.10Q25.92 16.27 25.08 14.81Q24.24 13.34 24.24 11.50L24.24 11.50Q24.24 9.65 25.04 8.18Q25.85 6.72 27.26 5.90Q28.68 5.09 30.48 5.09L30.48 5.09Q32.16 5.09 33.52 5.86Q34.87 6.62 35.68 7.99Q36.48 9.36 36.53 11.11L36.53 11.11L26.16 13.13Q26.64 14.66 27.90 15.54Q29.16 16.42 30.91 16.42L30.91 16.42ZM30.48 6.55Q29.16 6.55 28.12 7.16Q27.07 7.78 26.48 8.87Q25.90 9.96 25.90 11.38L25.90 11.38Q25.90 11.74 25.92 11.90L25.92 11.90L34.82 10.18Q34.54 8.59 33.36 7.57Q32.18 6.55 30.48 6.55L30.48 6.55ZM41.64 7.66Q42.24 6.38 43.43 5.74Q44.62 5.09 46.37 5.09L46.37 5.09L46.37 6.74L45.96 6.72Q43.97 6.72 42.84 7.94Q41.71 9.17 41.71 11.38L41.71 11.38L41.71 17.81L40.01 17.81L40.01 5.18L41.64 5.18L41.64 7.66ZM54.55 17.93Q52.68 17.93 51.20 17.11Q49.73 16.30 48.89 14.82Q48.05 13.34 48.05 11.50L48.05 11.50Q48.05 9.65 48.89 8.18Q49.73 6.72 51.20 5.90Q52.68 5.09 54.55 5.09L54.55 5.09Q56.18 5.09 57.47 5.72Q58.75 6.36 59.50 7.58L59.50 7.58L58.22 8.45Q57.60 7.51 56.64 7.04Q55.68 6.58 54.55 6.58L54.55 6.58Q53.18 6.58 52.09 7.19Q51 7.80 50.39 8.93Q49.78 10.06 49.78 11.50L49.78 11.50Q49.78 12.96 50.39 14.08Q51 15.19 52.09 15.80Q53.18 16.42 54.55 16.42L54.55 16.42Q55.68 16.42 56.64 15.96Q57.60 15.50 58.22 14.57L58.22 14.57L59.50 15.43Q58.75 16.66 57.46 17.29Q56.16 17.93 54.55 17.93L54.55 17.93ZM72.43 5.18L74.14 5.18L74.14 17.81L72.50 17.81L72.50 15.31Q71.74 16.58 70.48 17.26Q69.22 17.93 67.63 17.93L67.63 17.93Q65.86 17.93 64.42 17.11Q62.98 16.30 62.16 14.83Q61.34 13.37 61.34 11.50L61.34 11.50Q61.34 9.62 62.16 8.16Q62.98 6.70 64.42 5.89Q65.86 5.09 67.63 5.09L67.63 5.09Q69.17 5.09 70.40 5.72Q71.64 6.36 72.43 7.58L72.43 7.58L72.43 5.18ZM67.78 16.42Q69.10 16.42 70.16 15.80Q71.23 15.19 71.84 14.06Q72.46 12.94 72.46 11.50L72.46 11.50Q72.46 10.06 71.84 8.93Q71.23 7.80 70.16 7.19Q69.10 6.58 67.78 6.58L67.78 6.58Q66.43 6.58 65.36 7.19Q64.30 7.80 63.68 8.93Q63.07 10.06 63.07 11.50L63.07 11.50Q63.07 12.94 63.68 14.06Q64.30 15.19 65.36 15.80Q66.43 16.42 67.78 16.42L67.78 16.42ZM84.50 15.82L85.10 17.04Q84.62 17.47 83.93 17.70Q83.23 17.93 82.46 17.93L82.46 17.93Q80.69 17.93 79.73 16.97Q78.77 16.01 78.77 14.26L78.77 14.26L78.77 2.42L80.47 2.42L80.47 5.18L84.29 5.18L84.29 6.62L80.47 6.62L80.47 14.16Q80.47 15.29 81.02 15.88Q81.58 16.46 82.63 16.46L82.63 16.46Q83.78 16.46 84.50 15.82L84.50 15.82ZM92.90 17.93Q91.08 17.93 89.62 17.10Q88.15 16.27 87.31 14.81Q86.47 13.34 86.47 11.50L86.47 11.50Q86.47 9.65 87.31 8.18Q88.15 6.72 89.62 5.90Q91.08 5.09 92.90 5.09L92.90 5.09Q94.73 5.09 96.19 5.90Q97.66 6.72 98.48 8.18Q99.31 9.65 99.31 11.50L99.31 11.50Q99.31 13.34 98.48 14.81Q97.66 16.27 96.19 17.10Q94.73 17.93 92.90 17.93L92.90 17.93ZM92.90 16.42Q94.25 16.42 95.32 15.80Q96.38 15.19 96.98 14.06Q97.58 12.94 97.58 11.50L97.58 11.50Q97.58 10.06 96.98 8.93Q96.38 7.80 95.32 7.19Q94.25 6.58 92.90 6.58L92.90 6.58Q91.56 6.58 90.49 7.19Q89.42 7.80 88.81 8.93Q88.20 10.06 88.20 11.50L88.20 11.50Q88.20 12.94 88.81 14.06Q89.42 15.19 90.49 15.80Q91.56 16.42 92.90 16.42L92.90 16.42ZM112.61 0L114.31 0L114.31 17.81L112.68 17.81L112.68 15.31Q111.91 16.58 110.65 17.26Q109.39 17.93 107.81 17.93L107.81 17.93Q106.03 17.93 104.59 17.11Q103.15 16.30 102.34 14.83Q101.52 13.37 101.52 11.50L101.52 11.50Q101.52 9.62 102.34 8.16Q103.15 6.70 104.59 5.89Q106.03 5.09 107.81 5.09L107.81 5.09Q109.34 5.09 110.58 5.72Q111.82 6.36 112.61 7.58L112.61 7.58L112.61 0ZM107.95 16.42Q109.27 16.42 110.34 15.80Q111.41 15.19 112.02 14.06Q112.63 12.94 112.63 11.50L112.63 11.50Q112.63 10.06 112.02 8.93Q111.41 7.80 110.34 7.19Q109.27 6.58 107.95 6.58L107.95 6.58Q106.61 6.58 105.54 7.19Q104.47 7.80 103.86 8.93Q103.25 10.06 103.25 11.50L103.25 11.50Q103.25 12.94 103.86 14.06Q104.47 15.19 105.54 15.80Q106.61 16.42 107.95 16.42L107.95 16.42ZM124.22 17.93Q122.40 17.93 120.94 17.10Q119.47 16.27 118.63 14.81Q117.79 13.34 117.79 11.50L117.79 11.50Q117.79 9.65 118.63 8.18Q119.47 6.72 120.94 5.90Q122.40 5.09 124.22 5.09L124.22 5.09Q126.05 5.09 127.51 5.90Q128.98 6.72 129.80 8.18Q130.63 9.65 130.63 11.50L130.63 11.50Q130.63 13.34 129.80 14.81Q128.98 16.27 127.51 17.10Q126.05 17.93 124.22 17.93L124.22 17.93ZM124.22 16.42Q125.57 16.42 126.64 15.80Q127.70 15.19 128.30 14.06Q128.90 12.94 128.90 11.50L128.90 11.50Q128.90 10.06 128.30 8.93Q127.70 7.80 126.64 7.19Q125.57 6.58 124.22 6.58L124.22 6.58Q122.88 6.58 121.81 7.19Q120.74 7.80 120.13 8.93Q119.52 10.06 119.52 11.50L119.52 11.50Q119.52 12.94 120.13 14.06Q120.74 15.19 121.81 15.80Q122.88 16.42 124.22 16.42L124.22 16.42Z" transform="translate(36, 9.096)"></path></svg>
                            </a>
                        </div>

                        <div class="flex relative mx-auto w-1/2 mt-3">
                            <input class="border-1 border-gray-500 bg-gray transition h-10 px-5 pr-14 rounded-md focus:outline-none w-full text-black text-sm " type="search" name="search" placeholder="Search" />
                            <button type="submit" class="absolute right-2 top-3 mr-4">
                              <svg class="text-gray-400 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                                <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                              </svg>
                            </button>
                        </div>

                        <div class="flex items-top justify-center sm:items-center py-4 sm:pt-0">
                            @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                                        <x-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                                    <div>{{ Auth::user()->name }}</div>

                                                    <div class="ml-1">
                                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                </button>
                                            </x-slot>

                                            <x-slot name="content">
                                                <!--Profile-->
                                                <x-dropdown-link :href="route('profile')">
                                                    {{ __('Profile') }}
                                                </x-dropdown-link>

                                                @if (auth()->user()->role === 'admin')
                                                    <x-dropdown-link :href="route('users.index')">
                                                        {{ __('users') }}
                                                    </x-dropdown-link>

                                                    <x-dropdown-link :href="route('products.index')">
                                                        {{ __('Products') }}
                                                    </x-dropdown-link>
                                                @endif

                                                <!-- Authentication -->
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf

                                                    <x-dropdown-link :href="route('logout')"
                                                            onclick="event.preventDefault();
                                                                        this.closest('form').submit();">
                                                        {{ __('Log Out') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-dropdown>
                                    </div>

                                    <!-- Hamburger -->
                                    <div class="-mr-2 flex items-center sm:hidden">
                                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                    @else
                                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="py-12 bg-gray-100">
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
                                    <a href="#" class="group">
                                        <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                            @foreach ($product->image as $image)
                                                <img src="{{ asset('storage/images/'.$product->id.'/'.$image->image_name) }}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="w-full h-full object-center object-cover group-hover:opacity-75">
                                            @endforeach
                                        </div>
                                        <h3 class="mt-4 text-sm text-gray-700">{{ $product->name }}</h3>
                                        <p class="mt-1 text-lg font-medium text-gray-900">${{ $product->price }}</p>
                                    </a>
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

    </body>
</html>
