<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/icon.png') }}">
    @php
    $information = App\Models\Informations::all()->last();
    @endphp
    <title>{{$information->app_name}}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="  crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/vanillacss.css') }}">
    @livewireStyles
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="  crossorigin="anonymous"></script>
</head>
<body class="font-sans h-full antialiased  bg-[#F8F9FA]">
    <x-jet-banner />
    <div class="h-full">
        <!-- Page Content -->
        <div class="w-full h-screen flex fixed ">
            <aside x-data="{ open: false }" class="absolute top-0 h-screen -left-80 z-40 w-80 px-2 bg-white lg:bg-inherit lg:static shadow md:shadow-none" id="aside">
                <div class="relative menu is-menu-main h-full px-5 ">
                    <div class="p-2 py-1 mb-2 border-b">
                        {{-- Soft UI Dashboard --}}
                        <a href="/" class = "">
                            @php
                                   $information = App\Models\Informations::all()->last();
                            @endphp
                                <img class="block h-20 p-5 w-auto" alt="Logo" src="{{$information->logo_name ? asset('/storage/' . $information->logo_name) : asset('/img/Logo.png')}}">
                        </a>
                        

                        <button id="mobile-menu-button" class="text-gray-700 w-10 h-10 absolute top-3 -right-12 lg:hidden  focus:outline-none outline-none  md:block " onClick="toggleAside()" @click="open = !open">
                            <div class=" w-5">
                                <span aria-hidden="true" class="absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out" :class="{'rotate-45': open,' -translate-y-1.5': !open }"></span>
                                <span aria-hidden="true" class="absolute  h-0.5 w-5 bg-current   transform transition duration-500 ease-in-out" :class="{'opacity-0': open } "></span>
                                <span aria-hidden="true" class="absolute  h-0.5 w-5 bg-current transform  transition duration-500 ease-in-out" :class="{'-rotate-45': open, ' translate-y-1.5': !open}"></span>
                            </div>
                        </button>
                       <script>
                        function toggleAside(){
                            var element = document.getElementById("aside");
                            element.classList.toggle("-left-0");
                            var element = document.getElementById("mobile-menu-button");
                            element.classList.toggle("right-1");
                          }
                        </script>
                      
                    </div>
                    <a href="{{ route('adminsuperadmin.dashboard') }}" class="flex items-center p-2 mb-1 mt-5 rounded-lg  {{Request::segment(1) == 'dashboard' ? 'bg-white shadow-lg font-medium' : ''}}" >
                      <div class="w-8 h-8 p-1 rounded-lg ml-2 flex justify-center items-center {{Request::segment(1) == 'dashboard' ? 'text-white bg-[#CB0C9F] shadow-md' : 'bg-white  shadow-md'}}">  <i class="mdi mdi-speedometer mx-1 "></i> </div>
                        <span class="grow ml-3 text-gray-600">Dashboard</span>
                    </a>
                    <p class="text-xs leading-4 p-3 ml-1 font-bold text-gray-400 uppercase ">System</p>
                    <ul class="menu-list text-white">
                        @can('is_admin_or_superadmin')
                        <li class="--set-active-tables-html">
                            <a href="{{ route('adminsuperadmin.showManageWorkshops') }}" class="flex items-center p-2 mb-1 rounded-lg  {{Request::segment(1) == 'workshops' ? 'bg-white shadow-lg font-medium' : ''}}">
                                <div class="w-8 h-8 p-1 rounded-lg ml-2 flex justify-center items-center {{Request::segment(1) == 'workshops' ? 'text-white bg-[#CB0C9F] shadow-md' : 'bg-white text-black shadow-md'}}">  <i class="mdi mdi-widgets inline-flex mx-1"></i></div>
                                <span class="grow ml-3 text-gray-600">Workshops</span>

                                @php
                                $date = new DateTime("now", new DateTimeZone('Europe/Tirane') );
                                if(request()->user()->user_status == 'superadmin')
                                $pending = \App\Models\Workshop::where('workshops.time','>',$date->format("Y-m-d h:i:sa"))->get();
                                else{

                                $pending = \App\Models\Workshop::where(['workshops.author'=> Auth::id()])->where('workshops.time','>',$date->format("Y-m-d h:i:sa"))->get();
                                }
                                @endphp
                                @if(count($pending)>0)
                                <p class="w-4 h-4 text-xs flex justify-center items-center rounded-full bg-slate-400">{{count($pending)}}</p>
                                @endif
                            </a>
                        </li>
                        @endcan
                        @can('is_super_admin')
                        <li class="--set-active-tables-html">
                            <a href="{{ route('superadmin.showManageUsers') }}" class="flex items-center p-2 mb-1 rounded-lg  {{Request::segment(1) == 'users' ? 'bg-white shadow-lg font-medium' : ''}}">
                                <div class="w-8 h-8 p-1 rounded-lg ml-2 flex justify-center items-center {{Request::segment(1) == 'users' ? 'text-white bg-[#CB0C9F] shadow-md' : 'bg-white text-black shadow-md'}}">    <i class="mdi mdi-account-outline mx-1 "></i> </div>
                                <span class="grow ml-3 text-gray-600">Users</span>
                                @php
                                $users = App\Models\User::all();
                                @endphp
                                <p class="w-4 h-4 text-xs flex justify-center items-center rounded-full bg-slate-400">{{count($users)}}</p>
                            </a>
                        </li>
                        @endcan
                        @can('is_super_admin')
                        <li class="--set-active-tables-html">
                            <a href="{{ route('superadmin.showlandings') }}" class="flex items-center p-2 mb-1 rounded-lg  {{Request::is('landingpage') ? 'bg-white shadow-lg font-medium' : ''}}">
                                <div class="w-8 h-8 p-1 rounded-lg ml-2 flex justify-center items-center {{Request::is('landingpage') ? 'text-white bg-[#CB0C9F] shadow-md' : 'bg-white text-black shadow-md'}}"><i class="fa-solid fa-house-chimney mx-1 fa-sm"></i></div>
                                <span class="grow  ml-3 text-gray-600">Landing Page</span>
                            </a>
                        </li>
                        @endcan
                        @can('is_super_admin')
                        <li class="--set-active-tables-html">
                            <a href="{{ route('superadmin.showabouts') }}" class="flex items-center p-2 mb-1 rounded-lg  {{Request::is('aboutus') ? 'bg-white shadow-lg font-medium' : ''}}">
                                <div class="w-8 h-8 p-1 rounded-lg ml-2 flex justify-center items-center {{Request::is('aboutus') ? 'text-white bg-[#CB0C9F] shadow-md' : 'bg-white text-black shadow-md'}}"> <i class="fa-solid fa-address-card mx-1  fa-sm"></i></div>
                                <span class="grow  ml-3 text-gray-600">About Us</span>
                            </a>
                        </li>
                        @endcan
                        @can('is_admin_or_superadmin')
                        <li class="--set-active-tables-html">
                            <a href="{{ route('adminsuperadmin.shownewspages') }}" class="flex items-center p-2 mb-1 rounded-lg  {{Request::segment(1) == 'news' ? 'bg-white shadow-lg font-medium' : ''}}">
                                <div class="w-8 h-8 p-1 rounded-lg ml-2 flex justify-center items-center {{Request::segment(1) == 'news' ? 'text-white bg-[#CB0C9F] shadow-md' : 'bg-white text-black shadow-md'}}"> <i class="fa-regular fa-newspaper mx-1  fa-sm"></i></div>
                                <span class="grow ml-3 text-gray-600">News</span>
                                @php
                                $news = App\Models\NewsPage::where(['author'=> Auth::id()])->get();
                                @endphp
                                <p class="w-4 h-4 text-xs flex justify-center items-center rounded-full bg-slate-400">{{count($news)}}</p>

                            </a>
                        </li>
                        @endcan
                        @can('is_super_admin')
                        <li class="--set-active-tables-html">
                            <a href="{{ route('superadmin.ShowAppInfos') }}" class="flex items-center p-2 mb-1 rounded-lg  {{Request::segment(1) == 'appinformations' ? 'bg-white shadow-lg font-medium' : ''}}">
                                <div class="w-8 h-8 p-1 rounded-lg ml-2 flex justify-center items-center {{Request::segment(1) == 'appinformations' ? 'text-white bg-[#CB0C9F] shadow-md' : 'bg-white text-black shadow-md'}}">  <i class="mdi mdi-format-list-checkbox mx-1"></i></div>
                                <span class="grow ml-3 text-gray-600">App Informations</span>
                            </a>
                        </li>
                        @endcan
                        @can('is_super_admin')
                        <li class="--set-active-tables-html">
                            <a href="{{ route('superadmin.calendar') }}" class="flex items-center p-2 mb-1 rounded-lg  {{Request::segment(1) == 'calendar' ? 'bg-white shadow-lg font-medium' : ''}}">
                                <div class="w-8 h-8 p-1 rounded-lg ml-2 flex justify-center items-center {{Request::segment(1) == 'calendar'? 'text-white bg-[#CB0C9F] shadow-md' : 'bg-white text-black shadow-md'}}">  <i class="fa-sharp fa-solid fa-calendar-days "></i></div>
                                <span class="grow ml-3 text-gray-600">Calendar</span>
                            </a>
                        </li>
                        @endcan
                        @can('is_super_admin')
                        <li class="--set-active-tables-html">
                            <a href="{{ route('superadmin.faq') }}" class="flex items-center p-2 mb-1 rounded-lg  {{Request::segment(1) == 'faq' ? 'bg-white shadow-lg font-medium' : ''}}">
                                <div class="w-8 h-8 p-1 rounded-lg ml-2 flex justify-center items-center {{Request::segment(1) == 'faq'? 'text-white bg-[#CB0C9F] shadow-md' : 'bg-white text-black shadow-md'}}">  <i class="fa-solid fa-question mx-2"></i></div>
                                <span class="grow ml-3 text-gray-600">Faq</span>
                                @php
                                $faqs = App\Models\Faq::all();
                                @endphp
                                <p class="w-4 h-4 text-xs flex justify-center items-center rounded-full bg-slate-400">{{count($faqs)}}</p>
                            </a>
                        </li>
                        @endcan     
                        @can('is_super_admin')
                        <li class="--set-active-tables-html">
                            <a href="{{ route('superadmin.showWorkshopSettings') }}" class="flex items-center p-2 mb-1 rounded-lg  {{Request::segment(1) == 'workshopSettings' ? 'bg-white shadow-lg font-medium' : ''}}">
                                <div class="w-8 h-8 p-1 rounded-lg ml-2 flex justify-center items-center {{Request::segment(1) == 'workshopSettings' ? 'text-white bg-[#CB0C9F] shadow-md' : 'bg-white text-black shadow-md'}}">
                                    <i class="fa-solid fa-gear fa-sm"></i>
                                </div>
                                <span class="grow ml-3 text-gray-600">Workshop</span>
                            </a>
                        </li>
                        @endcan 
                </div>
            </aside>
            <div class="w-full overflow-y-scroll">
                @include('navigation-menu',['link'=>1])
                @yield('content')
            </div>
        </div>
    </div>
    @stack('modals')
    @livewireScripts
    @stack('scripts')
</body>
</html>