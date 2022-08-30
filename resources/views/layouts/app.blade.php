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
            @livewire('navigation-menu')
            <!-- Page Content -->

            <div class="w-full h-screen flex fixed">
                <aside class=" bg-[#3c4b64]  w-80 ">
                    
                    <div class="menu is-menu-main h-full px-5">
                        
                        <a href="{{ route('adminsuperadmin.dashboard') }}" class="flex items-center p-2 my-2  hover:bg-slate-600 rounded text-white {{Request::is('dashboard') ? 'bg-slate-500' : ''}}">
                            <i class="mdi mdi-speedometer mx-1 "></i>
                            <span class="grow">Dashboard</span>
                        </a>
        
                        <p class="text-xs leading-4 p-3  text-gray-400 uppercase ">System</p>
        
        
                         
                       <ul class="menu-list text-white">
                        @can('is_super_admin')
                        <li class="--set-active-tables-html my-2">
                            <a href="{{ route('superadmin.showManageUsers') }}" class="flex p-2 items-center  rounded {{Request::is('usersManager') ? 'bg-slate-500' : 'hover:bg-slate-600'}}">
                                <i class="mdi mdi-account-outline mx-1 "></i>
                                <span class="grow">Manage Users</span>
                                @php
                                $users = App\Models\User::all();
            @endphp 
            <p class="w-4 h-4 text-xs flex justify-center items-center rounded-full bg-slate-400">{{count($users)}}</p>                   
     
                            </a>
                        </li>
                        @endcan
                        @can('is_super_admin')
                        <li class="--set-active-tables-html my-2">
                            <a href="{{ route('superadmin.showlandings') }}" class="flex p-2 items-center  rounded {{Request::is('landings') ? 'bg-slate-500' : 'hover:bg-slate-600'}}">
                                <i class="fa-solid fa-house-chimney mx-1 fa-sm"></i>
                                <span class="grow">Landing Page</span>
                            </a>
                        </li>
                        @endcan
                        @can('is_super_admin')
                        <li class="--set-active-tables-html my-2">
                            <a href="{{ route('superadmin.showabouts') }}" class="flex p-2 items-center  rounded {{Request::is('abouts') ? 'bg-slate-500' : 'hover:bg-slate-600'}}">
                                <i class="fa-solid fa-address-card mx-1  fa-sm"></i>
                                <span class="grow">About Us</span>
                            </a>
                        </li>
                        @endcan
                        @can('is_admin_or_superadmin')
                        <li class="--set-active-tables-html my-2">
                            <a href="{{ route('superadmin.shownewspages') }}" class="flex p-2 items-center  rounded {{Request::is('newspages') ? 'bg-slate-500' : 'hover:bg-slate-600'}}">
                                <i class="fa-regular fa-newspaper mx-1  fa-sm"></i>
                                <span class="grow">News</span>
                                @php
                                $news = App\Models\NewsPage::all();
                              @endphp 
            <p class="w-4 h-4 text-xs flex justify-center items-center rounded-full bg-slate-400">{{count($news)}}</p>                   
     
                            </a>
                        </li>
                        @endcan
                        @can('is_super_admin')
                        <li class="--set-active-tables-html my-2">
                            <a href="{{ route('superadmin.ShowAppInfos') }}" class="flex p-2   rounded {{Request::is('appInfos') ? 'bg-slate-500' : 'hover:bg-slate-600'}}">
                                <i class="mdi mdi-format-list-checkbox mx-1"></i>
                                <span class="grow">App Informations</span>
                            </a>
                        </li>
                        @endcan
                        @can('is_admin_or_superadmin')
                        <li class="--set-active-tables-html my-2">
                            <a href="{{ route('adminsuperadmin.showManageWorkshops') }}" class="flex p-2 items-center  rounded {{Request::is('workshopManage') ? 'bg-slate-500' : 'hover:bg-slate-600'}}">
                               
                                <i class="mdi mdi-widgets inline-flex mx-1"></i>
                                <span class="grow">Manage Workshops</span>

                                @php
                                     if(request()->user()->user_status == 'superadmin')
                                            $pending = App\Models\workshops_users::where('workshops_users.application_status','pending')->get();
                                     else{
                                        $pending = App\Models\workshops_users::Join("workshops", function($join){
                                            $join->on("workshops_users.workshop_id", "=", "workshops.id");
                                            })
                                        ->where(['workshops.author'=> Auth::id(), 'workshops_users.application_status'=>'pending'])
                                        ->select('workshops_users.id as id')
                                        ->get();
                                    }
                                    @endphp
                                    @if(count($pending)>0) 
                                    <p class="w-4 h-4 text-xs flex justify-center items-center rounded-full bg-slate-400">{{count($pending)}}</p>
                                    @endif
                        
                            </a>
                        </li>
                        @endcan
                        @can('is_super_admin')
                        <li class="--set-active-tables-html my-2">
                            <a href="{{ route('superadmin.faq') }}" class="flex p-2  items-center rounded {{Request::is('faq') ? 'bg-slate-500' : 'hover:bg-slate-600'}}">
                                <i class="fa-solid fa-question mx-2"></i>
                                <span class="grow">Faq</span>
                                @php
                                $faqs = App\Models\Faq::all();
                            @endphp 
                           
                            <p class="w-4 h-4 text-xs flex justify-center items-center rounded-full bg-slate-400">{{count($faqs)}}</p>
                           
                                   
                            </a>
                        </li>
                        @endcan
                    </div>
                </aside>
                <div class="w-full  flex justify-center items-start overflow-y-scroll mb-10 pb-20">
                    @yield('content')
           
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
