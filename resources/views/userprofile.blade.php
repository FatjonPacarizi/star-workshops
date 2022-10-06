<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/icon.png') }}">
    <title>Star Workshop</title>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vanillacss.css') }}">


    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    @livewireStyles
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans h-full antialiased">
    <header>
        <div class="fixed bg-white w-full z-40">
            <nav x-data="{ open: false }" class="flex justify-between items-center px-5 py-3">


                <button class="text-gray-700 w-10 h-10 p-8 relative focus:outline-none bg-white outline-none mobile-menu-button sm:hidden md:flex lg:hidden" @click="open = !open">
                    <div class=" w-5 absolute left-1/2 top-1/2   transform  -translate-x-1/2 -translate-y-1/2">
                        <span aria-hidden="true" class="absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out" :class="{'rotate-45': open,' -translate-y-1.5': !open }"></span>
                        <span aria-hidden="true" class="absolute  h-0.5 w-5 bg-current   transform transition duration-500 ease-in-out" :class="{'opacity-0': open } "></span>
                        <span aria-hidden="true" class="absolute  h-0.5 w-5 bg-current transform  transition duration-500 ease-in-out" :class="{'-rotate-45': open, ' translate-y-1.5': !open}"></span>
                    </div>
                </button>


                <a href="{{ route('landing' ) }}">
                    @php
                    $information = App\Models\Informations::all()->last();
                    @endphp
                    <img class="h-10 m-3 mr-0 mt-1 w-auto " alt="Logo" src="{{$information->logo_name ? asset('/storage/' . $information->logo_name) : asset('/img/Logo.png')}}">
                </a>
                <div class="flex items-center">
                    <div class="hidden sm:hidden md:hidden lg:flex">
                        <a href="{{route('workshops')}}" class="px-3 py-2 text-sm hover-3 font-semibold" aria-current="page">WORKSHOPS</a>
                        <a href="/newspage" class="hover:text-white px-3 py-2 text-sm hover-3 font-semibold">NEWS </a>
                        <a href="/members" class="hover:text-white px-3 py-2 text-sm hover-3 font-semibold">MEMBERS </a>
                        <a href="/about" class="hover:text-white px-3 py-2 text-sm hover-3 font-semibold">ABOUT US </a>
                    </div>
                </div>
                @auth

                <div class="relative">
                    <div class="flex items-center">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button>
                                    <i class="fa-regular fa-bell mx-7 "></i>
                                    <p class="w-4 h-4 text-xs mr-3 text-white absolute top-0 right-0 flex justify-center items-center rounded-full bg-red-400">
                                        {{count(Auth::user()->unreadNotifications)}}
                                    </p>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Notifications') }}
                                </div>
                                <div class="px-4 text-xs py-2">
                                    @if (Auth::user()->unreadNotifications ->count() > 0 )
                                    @foreach(Auth::user()->unreadNotifications as $notification)
                                    <p>Workshop <b> {{ $notification->data['name'] }} </b> has just added.</p>
                                    <hr>
                                    @endforeach
                                    <a href="/markAsRead">
                                        Mark all as read
                                    </a>
                                    @else
                                    <p>There are no new notifications</p>
                                    @endif
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <div class="flex items-center">
                                    <button class="flex items-center text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover shadow" src="{{Auth::user()->profile_photo_path ? asset('/storage/' . Auth::user()->profile_photo_path) : asset('img/defaultuserphoto.png') }}" alt="{{ Auth::user()->name}}" />
                                        <h1 class="mx-2 font-bold">{{ Auth::user()->name}}</h1>
                                        <i class="fa-solid fa-caret-down mr-3"></i>
                                    </button>
                                </div>
                                @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white hover:text-white focus:outline-none transition">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
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
                                @can('is_admin_or_superadmin')
                                <x-jet-dropdown-link href="{{ ('dashboard') }}">
                                    {{ __('Dashboard') }}
                                </x-jet-dropdown-link>
                                @endcan
                                <x-jet-dropdown-link href="{{ ('userprofile') }}">
                                    {{ __('Profile') }}
                                </x-jet-dropdown-link>
                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                                @endif
                                <div class="border-t border-gray-100"></div>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    @else
                    <div class="flex items-center">
                        <a href="{{ route('login') }}" class="p-2 rounded-full hover-2">Log in</a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="p-2 rounded-full hover-2">Register</a>
                    </div>
                    @endif
                    @endauth


            </nav>
    </header>
    <div class="hidden flex mobile-menu lg:hidden">
        <ul class="bg-white text-black w-full absolute">
            <li><a href="{{route('workshops')}}" class="font-bold block text-sm flex justify-center py-4 text-sm  hover-2" aria-current="page">WORKSHOPS</a></li>
            <li><a href="/newspage" class="font-bold block text-sm flex justify-center py-4 text-sm hover-2">NEWS</a></li>
            <li><a href="/members" class="font-bold block text-sm flex justify-center py-4 text-sm hover-2">MEMBERS</a></li>
            <li><a href="/about" class="font-bold block text-sm flex justify-center py-4 text-sm hover-2">ABOUT US</a></li>
        </ul>
    </div>
    </div>
    <script>
        const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");

        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    </script>
    <div class="flex justify-end">
        <div class="flex space-x-4">
            @if (Route::has('login'))
            <div class="hidden absolute top-0 right-0 mt-6 px-6 sm:block flex text-black">
                @auth
                <!-- Authentication -->
                @can('is_admin_or_superadmin')
                <nav x-data="{ open: false }">
                    <!-- Primary Navigation Menu -->
                    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16">
                            <div class="hidden sm:flex  sm:ml-6">
                                <!-- Teams Dropdown -->
                                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                <div class="ml-3 relative">
                                    <x-jet-dropdown align="right" width="60">
                                        <x-slot name="trigger">
                                            <span class="inline-flex rounded-md">
                                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                                    {{ Auth::user()->currentTeam->name }}
                                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </span>
                                        </x-slot>
                                    </x-jet-dropdown>
                                </div>
                                @endif
                                <!-- Settings Dropdown -->
                                <div class="ml-3 relative">
                                    <x-jet-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                            <div class="flex items-center">
                                                <i class="fa-regular fa-bell mx-5 "></i>
                                                <button class="flex items-center text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                    <img class="h-8 w-8 rounded-full object-cover shadow" src="{{Auth::user()->profile_photo_path ? asset('/storage/' . Auth::user()->profile_photo_path) : asset('img/defaultuserphoto.png') }}" alt="{{ Auth::user()->name}}" />
                                                    <h1 class="mx-2 font-bold">{{ Auth::user()->name}}</h1>
                                                    <i class="fa-solid fa-caret-down mr-3"></i>
                                                </button>
                                            </div>
                                            @else
                                            <span class="inline-flex rounded-md">
                                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white hover:text-white focus:outline-none transition">
                                                    {{ Auth::user()->name }}

                                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
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
                                            <x-jet-dropdown-link href="{{ ('dashboard') }}">
                                                {{ __('Dashboard') }}
                                            </x-jet-dropdown-link>

                                            <x-jet-dropdown-link href="{{ ('userprofile') }}">
                                                {{ __('Profile') }}
                                            </x-jet-dropdown-link>
                                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                {{ __('API Tokens') }}
                                            </x-jet-dropdown-link>
                                            @endif
                                            <div class="border-t border-gray-100"></div>
                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf
                                                <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                                    {{ __('Log Out') }}
                                                </x-jet-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-jet-dropdown>
                                </div>
                            </div>
                            <!-- Hamburger -->
                            <div class="-mr-2 flex items-center sm:hidden">
                                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Responsive Navigation Menu -->
                    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                        <div class="pt-2 pb-3 space-y-1">
                            <x-jet-responsive-nav-link href="{{ route('adminsuperadmin.dashboard') }}" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-jet-responsive-nav-link>
                        </div>
                        <!-- Responsive Settings Options -->
                        <div class="pt-4 pb-1 border-t border-gray-200">
                            <div class="flex items-center px-4">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <div class="shrink-0 mr-3">
                                    @if(Auth::user()->profile_photo_path)
                                    <img class="h-8 w-8 rounded-full object-cover" src="/storage/{{Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name}}" />
                                    @else
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name}}" />
                                    @endif
                                </div>
                                @endif
                                <div>
                                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                                </div>
                            </div>
                            <div class="mt-3 space-y-1">
                                <!-- Account Management -->
                                <x-jet-responsive-nav-link href="{{ ('userprofile') }}" :active="request()->routeIs('userprofile')">
                                    {{ __('Profile') }}
                                </x-jet-responsive-nav-link>
                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                    {{ __('API Tokens') }}
                                </x-jet-responsive-nav-link>
                                @endif
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <x-jet-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-responsive-nav-link>
                                </form>

                            </div>
                        </div>
                    </div>
                </nav>
                @else
                <nav x-data="{ open: false }">
                    <!-- Primary Navigation Menu -->
                    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16">
                            <div class="hidden sm:flex  sm:ml-6">
                                <!-- Teams Dropdown -->
                                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                <div class="ml-3 relative">
                                    <x-jet-dropdown align="right" width="60">
                                        <x-slot name="trigger">
                                            <span class="inline-flex rounded-md">
                                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                                    {{ Auth::user()->currentTeam->name }}
                                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </span>
                                        </x-slot>
                                    </x-jet-dropdown>
                                </div>
                                @endif
                                <!-- Settings Dropdown -->
                                <div class="ml-3 relative">
                                    <x-jet-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                            <div class="flex items-center">
                                                <i class="fa-regular fa-bell mx-5 "></i>
                                                <button class="flex items-center text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                    <img class="h-8 w-8 rounded-full object-cover shadow" src="{{Auth::user()->profile_photo_path ? asset('/storage/' . Auth::user()->profile_photo_path) : asset('img/defaultuserphoto.png') }}" alt="{{ Auth::user()->name}}" />
                                                    <h1 class="mx-2 font-bold">{{ Auth::user()->name}}</h1>
                                                    <i class="fa-solid fa-caret-down mr-3"></i>
                                                </button>
                                            </div>
                                            @else
                                            <span class="inline-flex rounded-md">
                                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white hover:text-white focus:outline-none transition">
                                                    {{ Auth::user()->name }}

                                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
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
                                            <x-jet-dropdown-link href="{{ ('userprofile') }}">
                                                {{ __('Profile') }}
                                            </x-jet-dropdown-link>
                                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                {{ __('API Tokens') }}
                                            </x-jet-dropdown-link>
                                            @endif
                                            <div class="border-t border-gray-100"></div>
                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf
                                                <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                                    {{ __('Log Out') }}
                                                </x-jet-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-jet-dropdown>
                                </div>
                            </div>
                            <!-- Hamburger -->
                            <div class="-mr-2 flex items-center sm:hidden">
                                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Responsive Navigation Menu -->
                    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                        <div class="pt-2 pb-3 space-y-1">
                            <x-jet-responsive-nav-link href="{{ route('adminsuperadmin.dashboard') }}" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-jet-responsive-nav-link>
                        </div>
                        <!-- Responsive Settings Options -->
                        <div class="pt-4 pb-1 border-t border-gray-200">
                            <div class="flex items-center px-4">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <div class="shrink-0 mr-3">
                                    @if(Auth::user()->profile_photo_path)
                                    <img class="h-8 w-8 rounded-full object-cover" src="/storage/{{Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name}}" />
                                    @else
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name}}" />
                                    @endif
                                </div>
                                @endif
                                <div>
                                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                                </div>
                            </div>
                            <div class="mt-3 space-y-1">
                                <!-- Account Management -->
                                <x-jet-responsive-nav-link href="{{ ('userprofile') }}" :active="request()->routeIs('userprofile')">
                                    {{ __('Profile') }}
                                </x-jet-responsive-nav-link>
                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                    {{ __('API Tokens') }}
                                </x-jet-responsive-nav-link>
                                @endif
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <x-jet-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-responsive-nav-link>
                                </form>

                            </div>
                        </div>
                    </div>
                </nav>
                @endcan
                @else
                <a href="{{ route('login') }}" class="px-3 py-1 text-black hover-2">Log in</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="px-3 py-1 text-black hover-2">Register</a>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </div>
    @section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="px-5" x-data="{
        tab:0,
        active : 'bg-white shadow',
        inactive: ' hover:shadow '
       }">
        <div class="w-full  relative">
            <img class="w-full rounded-xl h-72" src="{{asset('/img/curved0.jpg')}}" alt=""></img>
            <div class="w-full h-full bg-gradient-to-tl from-purple-700 to-pink-500 absolute top-0 left-0 rounded-xl opacity-60 "></div>
            <div class="w-11/12 rounded-xl border border-white bg-white/70 shadow bg-clip-border backdrop-blur-2xl backdrop-saturate-200 absolute  left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                <div class="w-full h-full flex justify-between items-center  pl-5 py-5">
                    <div class="ml-1 flex items-center">
                        <img class="w-20 my-auto rounded-xl " alt="hero" src="{{Auth::user()->profile_photo_path ? asset('/storage/' . Auth::user()->profile_photo_path) : asset('img/defaultuserphoto.png')}}" />
                        <div class="ml-3 ">
                            <h1 class="text-black capitalize  text-lg">{{Auth::user()->name}}</h1>
                            <p class="text-xs text-gray-500">{{Auth::user()->user_status}}</p>
                        </div>
                    </div>
                    <div class="flex mr-5">
                        <button :class="tab === 0 ? active: inactive" class="rounded-md px-5 h-8 flex items-center" @click="tab = 0">Personal Info</button>
                        <button :class="tab === 1 ? active: inactive" class="rounded-md  px-5 h-8" @click="tab = 1 ">Security</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="mt-24" x-show="tab === 0">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            @livewire('profile.update-profile-information-form')
            <x-jet-section-border />
            @endif
        </div>

        <div class="mt-24" x-show="tab === 1">
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <div class="mt-10 sm:mt-0">
                @livewire('profile.update-password-form')
            </div>

            <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
            <div class="mt-10 sm:mt-0">
                @livewire('profile.two-factor-authentication-form')
            </div>

            <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('profile.delete-user-form')
            </div>
            @endif
            <div class="w-full   overflow-y-scroll ">
                @yield('content')
            </div>
        </div>
    </div>
    @stack('modals')
    @livewireScripts
    @include('layouts.partials.footer')
</body>

</html>