{{-- <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-1 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :active="request()->routeIs('usuarios.index')">

                        <x-dropdown :align="'top'">
                            <x-slot name="trigger">
                                <button class="pt-5 pr-10 z-20">{{ __('Usuarios') }}</button>
                            </x-slot>
                            <x-slot name="content">
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Users') }}
                                </div>
                                <x-dropdown-link href="{{ route('usuarios.index') }}">
                                    {{ __('Usuarios') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </x-nav-link>
                </div>
            </div>


            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200 dark:border-gray-600"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                        :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <!-- Team Switcher -->
                    @if (Auth::user()->allTeams()->count() > 1)
                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
</nav> --}}

<aside :class="menuOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
    class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 bg-secondary overflow-y-auto lg:translate-x-0 lg:inset-0 custom-scrollbar">
    <!-- start::Logo -->
    <div class="flex items-center justify-center bg-black bg-opacity-30 h-16">
        <h1 class="text-gray-100 text-lg font-bold uppercase tracking-widest">
            Template
        </h1>
    </div>
    <nav class="py-10 custom-scrollbar">
        <!-- start::Menu link -->
        <a x-data="{ linkHover: false }" @mouseover="linkHover = true" @mouseleave="linkHover = false"
            href="{{ route('dashboard') }}"
            class="flex items-center text-gray-400 px-6 py-3 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition duration-200"
                :class="linkHover ? 'text-gray-100' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span class="ml-3 transition duration-200" :class="linkHover ? 'text-gray-100' : ''">
                Dashboard
            </span>
        </a>
        <!-- end::Menu link -->

        <p class="text-xs text-gray-600 mt-10 mb-2 px-6 uppercase">Usuarios</p>

        <!-- start::Menu link roles -->
        @if (auth()->user()->can('administrador'))
            <div x-data="{ linkHover: false, linkActive: false }">
                <div @mouseover="linkHover = true" @mouseleave="linkHover = false" @click="linkActive = !linkActive"
                    class="flex items-center justify-between text-gray-400 hover:text-gray-100 px-6 py-3 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200"
                    :class="linkActive ? 'bg-black bg-opacity-30 text-gray-100' : ''">
                    <div class="flex items-center">
                        <span class="ml-3">Roles</span>
                    </div>
                    <svg class="w-3 h-3 transition duration-300" :class="linkActive ? 'rotate-90' : ''" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </div>
                <!-- start::Submenu -->
                <ul x-show="linkActive" x-cloak x-collapse.duration.300ms class="text-gray-400">
                    <!-- start::Submenu link -->
                    <li
                        class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                        <a href="{{ route('roles.index') }}" class="flex items-center">
                            <span class="mr-2 text-sm">&bull;</span>
                            <span class="overflow-ellipsis">Crear Roles</span>
                        </a>
                    </li>

                </ul>
                <!-- end::Submenu -->
            </div>
        @endcan
        <!-- end::Menu link -->

        <!-- start::Menu link permisos -->
        @if (auth()->user()->can('administrador'))
            <div x-data="{ linkHover: false, linkActive: false }">
                <div @mouseover="linkHover = true" @mouseleave="linkHover = false" @click="linkActive = !linkActive"
                    class="flex items-center justify-between text-gray-400 hover:text-gray-100 px-6 py-3 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200"
                    :class="linkActive ? 'bg-black bg-opacity-30 text-gray-100' : ''">
                    <div class="flex items-center">
                        <span class="ml-3">Permisos</span>
                    </div>
                    <svg class="w-3 h-3 transition duration-300" :class="linkActive ? 'rotate-90' : ''"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </div>
                <!-- start::Submenu -->
                <ul x-show="linkActive" x-cloak x-collapse.duration.300ms class="text-gray-400">
                    <!-- start::Submenu link -->
                    <li
                        class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                        <a href="{{ route('permisos.index') }}" class="flex items-center">
                            <span class="mr-2 text-sm">&bull;</span>
                            <span class="overflow-ellipsis">Crear Permisos</span>
                        </a>
                    </li>
                    <!-- end::Submenu link -->
                </ul>
                <!-- end::Submenu -->
            </div>
        @endcan
        <!-- end::Menu link -->

        <!-- start::Menu link  usuarios-->
        @if (auth()->user()->can('administrador'))
            <div x-data="{ linkHover: false, linkActive: false }">
                <div @mouseover="linkHover = true" @mouseleave="linkHover = false"
                    @click="linkActive = !linkActive"
                    class="flex items-center justify-between text-gray-400 hover:text-gray-100 px-6 py-3 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200"
                    :class="linkActive ? 'bg-black bg-opacity-30 text-gray-100' : ''">
                    <div class="flex items-center">
                        <span class="ml-3">Usuarios</span>
                    </div>
                    <svg class="w-3 h-3 transition duration-300" :class="linkActive ? 'rotate-90' : ''"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </div>
                <!-- start::Submenu -->
                <ul x-show="linkActive" x-cloak x-collapse.duration.300ms class="text-gray-400">
                    <!-- start::Submenu link -->
                    <li
                        class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                        <a href="{{ route('asignar.index') }}" class="flex items-center">
                            <span class="mr-2 text-sm">&bull;</span>
                            <span class="overflow-ellipsis">Asignar Roles</span>
                        </a>
                    </li>
                    <!-- end::Submenu link -->
                </ul>
                <!-- end::Submenu -->
            </div>
        @endcan
        <!-- end::Menu link -->

        <!-- start::Menu link  alumnos-->
        @if (auth()->user()->can('administrador'))
            <div x-data="{ linkHover: false, linkActive: false }">
                <div @mouseover="linkHover = true" @mouseleave="linkHover = false"
                    @click="linkActive = !linkActive"
                    class="flex items-center justify-between text-gray-400 hover:text-gray-100 px-6 py-3 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200"
                    :class="linkActive ? 'bg-black bg-opacity-30 text-gray-100' : ''">
                    <div class="flex items-center">
                        <span class="ml-3">Alumnos</span>
                    </div>
                    <svg class="w-3 h-3 transition duration-300" :class="linkActive ? 'rotate-90' : ''"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </div>
                <!-- start::Submenu -->
                <ul x-show="linkActive" x-cloak x-collapse.duration.300ms class="text-gray-400">
                    <!-- start::Submenu link -->
                    <li
                        class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                        <a href="{{ route('alumnos.index') }}" class="flex items-center">
                            <span class="mr-2 text-sm">&bull;</span>
                            <span class="overflow-ellipsis">Ver Alumnos</span>
                        </a>
                    </li>
                    <!-- end::Submenu link -->

                    <!-- start::Submenu link -->
                    <li
                        class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                        <a href="{{ route('cursos.index') }}" class="flex items-center">
                            <span class="mr-2 text-sm">&bull;</span>
                            <span class="overflow-ellipsis">View Cursos</span>
                        </a>
                    </li>
                    <!-- end::Submenu link -->
                    
                    <!-- start::Submenu link -->
                    <li
                        class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                        <a href="{{ route('notas.index') }}" class="flex items-center">
                            <span class="mr-2 text-sm">&bull;</span>
                            <span class="overflow-ellipsis">View Notas</span>
                        </a>
                    </li>
                    <!-- end::Submenu link -->
                </ul>
                <!-- end::Submenu -->
            </div>
        @endcan
        <!-- end::Menu link -->

        <!-- start::Menu link profesores-->
        @if (auth()->user()->can('administrador'))
            <div x-data="{ linkHover: false, linkActive: false }">
                <div @mouseover="linkHover = true" @mouseleave="linkHover = false"
                    @click="linkActive = !linkActive"
                    class="flex items-center justify-between text-gray-400 hover:text-gray-100 px-6 py-3 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200"
                    :class="linkActive ? 'bg-black bg-opacity-30 text-gray-100' : ''">
                    <div class="flex items-center">
                        <span class="ml-3">Profesores</span>
                    </div>
                    <svg class="w-3 h-3 transition duration-300"
                        :class="linkActive ? 'rotate-90' : ''" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </div>
                <!-- start::Submenu -->
                <ul x-show="linkActive" x-cloak x-collapse.duration.300ms class="text-gray-400">
                    <!-- start::Submenu link -->
                    <li
                        class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                        <a href="{{ route('profesores.index') }}" class="flex items-center">
                            <span class="mr-2 text-sm">&bull;</span>
                            <span class="overflow-ellipsis">Ver Profesores</span>
                        </a>
                    </li>
                    <!-- end::Submenu link -->
                    {{-- <!-- start::Submenu link -->
                    <li
                        class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                        <a href="{{ route('cursos.index') }}" class="flex items-center">
                            <span class="mr-2 text-sm">&bull;</span>
                            <span class="overflow-ellipsis">View Cursos</span>
                        </a>
                    </li>
                    <!-- end::Submenu link --> --}}
                </ul>
                <!-- end::Submenu -->
            </div>
        @endcan
        <!-- end::Menu link -->

        <!-- start::Menu link asistencias -->
        @if (auth()->user()->can('administrador') ||
                auth()->user()->can('profesor'))
            <div x-data="{ linkHover: false, linkActive: false }">
                <div @mouseover="linkHover = true" @mouseleave="linkHover = false"
                    @click="linkActive = !linkActive"
                    class="flex items-center justify-between text-gray-400 hover:text-gray-100 px-6 py-3 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200"
                    :class="linkActive ? 'bg-black bg-opacity-30 text-gray-100' : ''">
                    <div class="flex items-center">
                        <span class="ml-3">Asistencias</span>
                    </div>
                    <svg class="w-3 h-3 transition duration-300"
                        :class="linkActive ? 'rotate-90' : ''" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </div>
                <!-- start::Submenu -->
                <ul x-show="linkActive" x-cloak x-collapse.duration.300ms class="text-gray-400">
                    <!-- start::Submenu link -->
                    <li
                        class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                        <a href="{{ route('asistencia.create') }}" class="flex items-center">
                            <span class="mr-2 text-sm">&bull;</span>
                            <span class="overflow-ellipsis">Registrar Asistencias</span>
                        </a>
                    </li>
                    <!-- end::Submenu link -->

                    <!-- start::Submenu link -->
                    <li
                        class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                        <a href="{{ route('asistencia.index') }}" class="flex items-center">
                            <span class="mr-2 text-sm">&bull;</span>
                            <span class="overflow-ellipsis">Ver Asistencias</span>
                        </a>
                    </li>
                    <!-- end::Submenu link -->

                </ul>
                <!-- end::Submenu -->
            </div>
        @endcan
        <!-- end::Menu link -->

        <!-- start::Menu link Partes -->
        @if (auth()->user()->can('administrador') ||
                auth()->user()->can('profesor'))
            <div x-data="{ linkHover: false, linkActive: false }">
                <div @mouseover="linkHover = true" @mouseleave="linkHover = false"
                    @click="linkActive = !linkActive"
                    class="flex items-center justify-between text-gray-400 hover:text-gray-100 px-6 py-3 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200"
                    :class="linkActive ? 'bg-black bg-opacity-30 text-gray-100' : ''">
                    <div class="flex items-center">
                        <span class="ml-3">Partes de Conducta</span>
                    </div>
                    <svg class="w-3 h-3 transition duration-300"
                        :class="linkActive ? 'rotate-90' : ''" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </div>
                <!-- start::Submenu -->
                <ul x-show="linkActive" x-cloak x-collapse.duration.300ms
                    class="text-gray-400">
                    <!-- start::Submenu link -->
                    <li
                        class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                        <a href="{{ route('conducta.index') }}" class="flex items-center">
                            <span class="mr-2 text-sm">&bull;</span>
                            <span class="overflow-ellipsis">Partes de Conducta</span>
                        </a>
                    </li>
                    <!-- end::Submenu link -->
                </ul>
                <!-- end::Submenu -->
            </div>
        @endcan
        <!-- end::Menu link -->

        <!-- start::Menu link Justificaciones -->
        @if (auth()->user()->can('administrador') ||
                auth()->user()->can('profesor'))
            <div x-data="{ linkHover: false, linkActive: false }">
                <div @mouseover="linkHover = true" @mouseleave="linkHover = false"
                    @click="linkActive = !linkActive"
                    class="flex items-center justify-between text-gray-400 hover:text-gray-100 px-6 py-3 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200"
                    :class="linkActive ? 'bg-black bg-opacity-30 text-gray-100' : ''">
                    <div class="flex items-center">
                        <span class="ml-3">Justificaciones</span>
                    </div>
                    <svg class="w-3 h-3 transition duration-300"
                        :class="linkActive ? 'rotate-90' : ''" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </div>
                <!-- start::Submenu -->
                <ul x-show="linkActive" x-cloak x-collapse.duration.300ms
                    class="text-gray-400">
                    <!-- start::Submenu link -->
                    <li
                        class="pl-10 pr-6 py-2 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200 hover:text-gray-100">
                        <a href="{{ route('justificaciones.index') }}"
                            class="flex items-center">
                            <span class="mr-2 text-sm">&bull;</span>
                            <span class="overflow-ellipsis">Justificaciones</span>
                        </a>
                    </li>
                    <!-- end::Submenu link -->
                </ul>
                <!-- end::Submenu -->
            </div>
        @endcan
        <!-- end::Menu link -->

        <!-- start::Menu link -->
        <a x-data="{ linkHover: false }" @mouseover="linkHover = true"
            @mouseleave="linkHover = false" href="./../messages.html"
            class="flex items-center text-gray-400 px-6 py-3 cursor-pointer hover:bg-black hover:bg-opacity-30 transition duration-200">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 transition duration-200"
                :class="linkHover ? 'text-gray-100' : ''" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
            </svg>
            <span class="ml-3 transition duration-200"
                :class="linkHover ? 'text-gray-100' : ''">
                Messages
            </span>
        </a>
        <!-- end::Menu link -->
        {{-- <p class="text-xs text-gray-600 mt-10 mb-2 px-6 uppercase">Components</p> --}}
</nav>
</aside>
