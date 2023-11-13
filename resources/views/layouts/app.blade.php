<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div x-data="{
        menuOpen: false,
        basicSignInModal: false,
        basicSignUpModal: false,
        advanceSignInModal: false,
        advanceSignUpModal: false,
    }" class="flex min-h-screen custom-scrollbar">

        <!-- start::Black overlay -->
        <div :class="menuOpen ? 'block' : 'hidden'" @click="menuOpen = false"
            class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>
        <!-- end::Black overlay -->
        <div class="min-h-screen lg:pl-64 w-full flex flex-col bg-gray-100 dark:bg-gray-900">
            @livewire('navigation-menu')

            <!-- Page Content -->
            <main>
                <div class="">
                    <div class="w-full">
                        <header class="flex justify-between items-center h-16 py-4 px-6 ">
                            <!-- start::Mobile menu button -->
                            <div class="flex items-center">
                                <!-- Page Heading -->

                                <button @click="menuOpen = true"
                                    class="text-gray-500 hover:text-primary focus:outline-none lg:hidden transition duration-200">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h7">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <!-- end::Mobile menu button -->

                            <!-- start::Right side top menu -->
                            <div class="flex items-center">
                                <!-- start::Profile -->
                                <div x-data="{ linkActive: false }" class="relative">
                                    <!-- start::Main link -->
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <div @click="linkActive = !linkActive" class="cursor-pointer">
                                            <img class="h-8 w-8 rounded-full object-cover"
                                                src="{{ Auth::user()->profile_photo_url }}"
                                                alt="{{ Auth::user()->name }}" />
                                        </div>
                                        <!-- end::Main link -->

                                        <!-- start::Submenu -->
                                        <div x-show="linkActive" @click.away="linkActive = false" x-cloak
                                            class="absolute right-0 w-40 top-11 border border-gray-300 z-20">
                                            <!-- start::Submenu content -->
                                            <div class="bg-white rounded">
                                                <!-- start::Submenu link -->
                                                <a x-data="{ linkHover: false }"
                                                    href="{{ route('perfil.mostrar') }}"
                                                    class="flex items-center justify-between py-2 px-3 hover:bg-gray-100 bg-opacity-20"
                                                    @mouseover="linkHover = true" @mouseleave="linkHover = false">
                                                    <div class="flex items-center">
                                                        <svg class="w-5 h-5 text-primary" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                            </path>
                                                        </svg>
                                                        <div class="text-sm ml-3">
                                                            <p class="text-gray-600 font-bold capitalize"
                                                                :class="linkHover ? 'text-primary' : ''">Profile</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!-- end::Submenu link -->

                                                <!-- start::Submenu link -->
                                                <a x-data="{ linkHover: false }" href="{{ route('profile.show') }}"
                                                    class="flex items-center justify-between py-2 px-3 hover:bg-gray-100 bg-opacity-20"
                                                    @mouseover="linkHover = true" @mouseleave="linkHover = false">
                                                    <div class="flex items-center">
                                                        <svg class="w-5 h-5 text-primary" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                            </path>
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                                            </path>
                                                        </svg>
                                                        <div class="text-sm ml-3">
                                                            <p class="text-gray-600 font-bold capitalize"
                                                                :class="linkHover ? 'text-primary' : ''">Settings</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!-- end::Submenu link -->

                                                <hr>

                                                <!-- start::Submenu link -->
                                                <form method="POST" action="{{ route('logout') }}"
                                                    x-data="{ linkHover: false }"class="flex items-center justify-between py-2 px-3 hover:bg-gray-100 bg-opacity-20"
                                                    @mouseover="linkHover = true" @mouseleave="linkHover = false">
                                                    @csrf
                                                    <div class="flex items-center">
                                                        <svg class="w-5 h-5 text-red-600" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                            </path>
                                                        </svg>
                                                        <x-responsive-nav-link href="{{ route('logout') }}"
                                                            @click.prevent="$root.submit();">
                                                            {{ __('Log Out') }}
                                                        </x-responsive-nav-link>
                                                    </div>
                                                </form>
                                                <!-- end::Submenu link -->
                                            </div>
                                            <!-- end::Submenu content -->
                                        </div>
                                    @else
                                        <span class="inline-flex rounded-md">
                                            <div @click="linkActive = !linkActive"
                                                class="cursor-pointer inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150"">
                                                {{ Auth::user()->name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                                <div x-show="linkActive" @click.away="linkActive = false" x-cloak
                                                    class="absolute right-0 w-40 top-11 border border-gray-300 z-20">
                                                    <!-- start::Submenu content -->
                                                    <div class="bg-gray-800">
                                                        <!-- start::Submenu link -->
                                                        <a x-data="{ linkHover: false }" href=""
                                                            class="flex items-center justify-between py-2 px-3 hover:bg-gray-700"
                                                            @mouseover="linkHover = true"
                                                            @mouseleave="linkHover = false">
                                                            <div class="flex items-center">
                                                                <svg class="w-5 h-5 text-primary" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                                    </path>
                                                                </svg>
                                                                <div class="text-sm ml-3">
                                                                    <p class="text-gray-200 font-bold capitalize"
                                                                        :class="linkHover ? 'text-primary' : ''">Profile
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <!-- end::Submenu link -->

                                                        <!-- start::Submenu link -->
                                                        <a x-data="{ linkHover: false }" href="{{ route('profile.show') }}"
                                                            class="flex items-center justify-between py-2 px-3 hover:bg-gray-700"
                                                            @mouseover="linkHover = true"
                                                            @mouseleave="linkHover = false">
                                                            <div class="flex items-center">
                                                                <svg class="w-5 h-5 text-primary" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                                    </path>
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                                                    </path>
                                                                </svg>
                                                                <div class="text-sm ml-3">
                                                                    <p class="text-gray-200 font-bold capitalize"
                                                                        :class="linkHover ? 'text-primary' : ''">
                                                                        Settings
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <!-- end::Submenu link -->

                                                        <hr>

                                                        <!-- start::Submenu link -->
                                                        <form method="POST" action="{{ route('logout') }}"
                                                            x-data="{ linkHover: false }"class="flex items-center justify-between py-2 px-3 hover:bg-gray-700"
                                                            @mouseover="linkHover = true"
                                                            @mouseleave="linkHover = false">
                                                            @csrf
                                                            <div class="flex items-center">
                                                                <svg class="w-5 h-5 text-red-600" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                                    </path>
                                                                </svg>
                                                                <x-responsive-nav-link href="{{ route('logout') }}"
                                                                    @click.prevent="$root.submit();">
                                                                    {{ __('Log Out') }}
                                                                </x-responsive-nav-link>
                                                            </div>
                                                        </form>
                                                        <!-- end::Submenu link -->
                                                    </div>
                                                    <!-- end::Submenu content -->
                                                </div>
                                            </div>
                                            {{-- </button> --}}

                                        </span>
                                    @endif
                                    <!-- end::Submenu -->
                                </div>
                                <!-- end::Profile -->
                            </div>
                            <!-- end::Right side top menu -->
                        </header>

                        <div class="h-full max-w-7xl p-8">
                            @if (isset($header))
                                <header class="bg-white dark:bg-gray-800 shadow ">
                                    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                                        {{ $header }}
                                    </div>
                                </header>
                            @endif
                            <div class="pt-5">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
</body>



</html>
