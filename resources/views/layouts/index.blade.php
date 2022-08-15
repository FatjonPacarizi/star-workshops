<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            <!-- Page Content -->
            <div class="w-full h-screen flex ">
                <aside class=" bg-[#3c4b64]  w-80 ">
                    
                    <div class="menu is-menu-main px-5">
                        <a href="{{ route('dashboard') }}" class="flex items-center p-2 my-2  hover:bg-slate-600 rounded text-white {{Request::is('dashboard') ? 'bg-slate-500' : ''}}">
                            <span class="inline-flex items-center justify-center h-6 w-6"><i class="mdi mdi-speedometer inline-flex"></i></span>
                            <span class="grow">Dashboard</span>
                        </a>
        
                        <p class="text-xs leading-4 p-3  text-gray-400 uppercase ">System</p>
        
        
                         
                       <ul class="menu-list text-white">
                        @can('is_super_admin')
                        <li class="--set-active-tables-html my-2">
                            <a href="{{ route('superadmin.showManageUsers') }}" class="flex p-2   rounded {{Request::is('usersManager') ? 'bg-slate-500' : 'hover:bg-slate-600'}}">
                                <span class="inline-flex items-center justify-center h-6 w-6"><i class="mdi mdi-account-outline inline-flex"></i></span>
                                <span class="grow">Manage Users</span>
                            </a>
                        </li>
                        @endcan
                        @can('is_super_admin')
                        <li class="--set-active-tables-html my-2">
                            <a href="{{ route('superadmin.showabouts') }}" class="flex p-2   rounded {{Request::is('abouts') ? 'bg-slate-500' : 'hover:bg-slate-600'}}">
                                <span class="inline-flex items-center justify-center h-6 w-6"><i class="mdi mdi-account-outline inline-flex"></i></span>
                                <span class="grow">About Us</span>
                            </a>
                        </li>
                        @endcan
                        @can('is_admin_or_superadmin')
                        <li class="--set-active-tables-html my-2">
                            <a href="{{ route('adminsuperadmin.ShowAppInfos') }}" class="flex p-2   rounded {{Request::is('appInfos') ? 'bg-slate-500' : 'hover:bg-slate-600'}}">
                                <span class="inline-flex items-center justify-center h-6 w-6"><i class="mdi mdi-format-list-checkbox inline-flex"></i></span>
                                <span class="grow">App Informations</span>
                            </a>
                        </li>
                        @endcan
                        @can('is_admin_or_superadmin')
                        <li class="--set-active-tables-html my-2">
                            <a href="{{ route('adminsuperadmin.showManageWorkshops') }}" class="flex p-2   rounded {{Request::is('workshopManage') ? 'bg-slate-500' : 'hover:bg-slate-600'}}">
                                <span class="inline-flex items-center justify-center h-6 w-6"><i class="mdi mdi-widgets inline-flex"></i></span>
                                <span class="grow">Manage Workshops</span>
                            </a>
                        </li>
                        @endcan
                    </div>
                </aside>
            <div class="w-full flex justify-left items-left m-3">
                <div class="p-6 flex h-fit bg-white w-full " >
                    <div class="txt items-center border-r border-indigo-100">
                    <span class="inline-flex rounded-md">
                        <div class="p-6 max-w-sm bg-white ">
                            <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ Auth::user()->name }}<h1>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Auth::user()->email }}</p>
                            
                        </div>
                    </span>
                    </div>
                    <div class="    ">
                        <div class="flex text-center justify-around p-6  bg-white">
                        <div class="txt m-2 p-4 ">
                                @php
                                $workshops = App\Models\Workshop::find(1);
                         @endphp
                            <h1 class=" mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$workshops->count()}}</h1>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Workshop</p>
                            
                        </div>
                        <div class="txt border-r border-indigo-100">

                        </div>
                        <div class="txt m-2 p-4 ">
                            @php
                               $users = App\Models\User::find(1);
                        @endphp
                            <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$users->count()}} </h1>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Users</p>
                        </div>
                        
                        </div>
                        <div class="m-3  items-center">
                            <div class="p-6  bg-white  ">
                                <img class="object-cover w-full" alt="Map" src="{{ asset('img/chart.png') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @stack('modals')

        @livewireScripts
    </body>
</html>