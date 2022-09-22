<header>
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
                            <img class="h-10 m-3 mt-1 w-auto "alt="Logo" src="{{$information->logo_name ? asset('/storage/' . $information->logo_name) : asset('/img/Logo.png')}}">
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

                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div class="flex items-center">
                                <i class="fa-regular fa-bell mx-5 "></i>
                                <button class="flex items-center text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover shadow" src="{{Auth::user()->profile_photo_path ? asset('/storage/' . Auth::user()->profile_photo_path) : asset('img/defaultuserphoto.png') }}" alt="{{ Auth::user()->name}}" />
                                <h1 class = "mx-2 font-bold">{{ Auth::user()->name}}</h1>
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
                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
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
    <script>
        const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");

            btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
            });
    </script>
    