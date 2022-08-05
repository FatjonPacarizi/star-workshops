@extends('welcome')

<header>
    <!-- This example requires Tailwind CSS  -->
    <nav class="bg-red-700">
        <div class="mx-auto max-w-container px-4 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" class="sm:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">MENU</span>
                        <!--
            Icon when menu is closed.

            Heroicon name: outline/menu

            Menu open: "hidden", Menu closed: "block"
          -->
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!--
            Icon when menu is open.

            Heroicon name: outline/x

            Menu open: "block", Menu closed: "hidden"
          -->
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center">
                        <img class="block h-48 p-5 mt-2 w-auto" alt="Logo" src="{{ asset('img/Logo.png') }}">
                    </div>
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-red-700 text-white", Default: "text-white hover:bg-red-700 hover:text-white" -->
                            <a href="#" class="bg-red-700 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">WHO WE ARE</a>

                            <a href="#" class="text-white hover:bg-red-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">OUR SERVICES</a>

                            <a href="#" class="text-white hover:bg-red-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">EVENTS</a>

                            <a href="#" class="text-white hover:bg-red-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">NEWS</a>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end">
                    @if (Route::has('login'))
                    <div class="hidden  top-0 right-0 px-6 py-5 sm:block">
                        @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        @else
                        <a href="{{ route('login') }}" class="p-2 rounded-full text-white hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">Log in</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="p-2 rounded-full text-white hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">Register</a>
                        @endif
                        @endauth
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <!-- Current: "bg-red-500 text-white", Default: "text-white hover:bg-red-500 hover:text-white" -->
                <a href="#" class="text-white hover:bg-red-500 hover:text-white block px-3 py-2 rounded-md text-base font-medium">WHO WE ARE</a>

                <a href="#" class="text-white hover:bg-red-500 hover:text-white block px-3 py-2 rounded-md text-base font-medium">OUR SERVICES</a>

                <a href="#" class="text-white hover:bg-red-500 hover:text-white block px-3 py-2 rounded-md text-base font-medium">EVENTS</a>

                <a href="#" class="text-white hover:bg-red-500 hover:text-white block px-3 py-2 rounded-md text-base font-medium">NEWS</a>
            </div>
        </div>
    </nav>
</header>