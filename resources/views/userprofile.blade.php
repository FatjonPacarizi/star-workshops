<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class = "h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
 <link rel="icon" href="{{ asset('img/icon.png') }}">
    <title>Star Workshop</title>
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @livewireStyles
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans h-full antialiased">
        <x-jet-banner />
        <div class="h-full bg-gray-100">
        @include('layouts.partials.nav')
@section('content')
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }} 
        </h2>
    </x-slot>
 
    <div class = "px-5" x-data="{
        tab:0,
        active : 'bg-white shadow',
        inactive: ' hover:shadow '
       }">
        <div class="w-full  relative">
            <img class = "w-full rounded-xl h-72" src="{{asset('/img/curved0.jpg')}}" alt="" ></img>
            <div class="w-full h-full bg-gradient-to-tl from-purple-700 to-pink-500 absolute top-0 left-0 rounded-xl opacity-60 "></div>
            <div class = "w-11/12 rounded-xl border border-white bg-white/70 shadow bg-clip-border backdrop-blur-2xl backdrop-saturate-200 absolute  left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                <div class="w-full h-full flex justify-between items-center  pl-5 py-5"  >
                    <div class="ml-1 flex items-center">
                    <img class="w-20 my-auto rounded-xl " alt="hero" src="{{Auth::user()->profile_photo_path ? asset('/storage/' . Auth::user()->profile_photo_path) : asset('img/defaultuserphoto.png')}}"/> 
                        <div class = "ml-3 "><h1 class = "text-black capitalize  text-lg">{{Auth::user()->name}}</h1> <p class = "text-xs text-gray-500">{{Auth::user()->user_status}}</p></div>
                    </div>
                    <div class="flex mr-5">
                    <button  :class = "tab === 0 ? active: inactive" class = "rounded-md px-5 h-8 flex items-center" @click="tab = 0">Personal Info</button>
                    <button :class = "tab === 1 ? active: inactive" class = "rounded-md  px-5 h-8" @click="tab = 1 ">Security</button>
                   </div>
                </div>
            </div>
            
        </div>
        <div class = "mt-24" x-show="tab === 0">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            @livewire('profile.update-profile-information-form')
            <x-jet-section-border />
            @endif
       </div>

       <div class = "mt-24" x-show="tab === 1">
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