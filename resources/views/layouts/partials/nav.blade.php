@extends('welcome')

<header>
    <!-- This example requires Tailwind CSS  -->
    <nav class="bg-white">
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
                        <a href="{{ route('landing' ) }}">

                            @php
                            $information = App\Models\Informations::find(1);
                              @endphp
                     
                         <img class="block h-10 m-3 mt-1 w-auto"alt="Logo" src="{{$information->logo_name ? asset('/storage/' . $information->logo_name) : asset('/img/Logo.png')}}">
           
                        </a>
                    </div>
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-red-700 text-white", Default: "text-white hover:bg-red-700 hover:text-white" -->
                            <a href="{{route('workshops')}}" class="text-red-700 hover:text-red-700 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">WORKSHOPS</a>
                            <a href="/about" class="text-red-700 hover:text-red-700 px-3 py-2 rounded-md text-sm font-medium">ABOUT US</a>
                            <a href="/members" class="text-red-700 hover:text-red-700 px-3 py-2 rounded-md text-sm font-medium">MEMBERS</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <!-- Current: "bg-red-500 text-white", Default: "text-white hover:bg-red-500 hover:text-white" -->
                <a href="{{route('workshops')}}" class="text-red-700 hover:text-red-700 block px-3 py-2 rounded-md text-base font-medium">Workshops</a>
                <a href="/about" class="text-red-700 hover:text-red-700 block px-3 py-2 rounded-md text-base font-medium">ABOUT US</a>
                <a href="/members" class="text-red-700 hover:text-red-700 block px-3 py-2 rounded-md text-base font-medium">MEMBERS</a>
   

            </div>
        </div>
    </nav>
</header>