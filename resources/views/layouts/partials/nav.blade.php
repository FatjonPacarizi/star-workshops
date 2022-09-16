@extends('welcome')
<header>
    <nav x-data="{ open: false }" class="flex py-3">
        <button class="text-gray-700 w-10 h-10 p-8 relative focus:outline-none bg-white outline-none mobile-menu-button sm:hidden md:flex lg:hidden" @click="open = !open">
            <div class="block w-5 absolute left-1/2 top-1/2   transform  -translate-x-1/2 -translate-y-1/2">
                <span aria-hidden="true" class="block absolute h-0.5 w-5 bg-current transform transition duration-500 ease-in-out" :class="{'rotate-45': open,' -translate-y-1.5': !open }"></span>
                <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-current   transform transition duration-500 ease-in-out" :class="{'opacity-0': open } "></span>
                <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-current transform  transition duration-500 ease-in-out" :class="{'-rotate-45': open, ' translate-y-1.5': !open}"></span>
            </div>
        </button>
     
                <div class="flex items-center sm:justify-center md:justify-center lg:justify-center">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('landing' ) }}">
                            @php
                            $information = App\Models\Informations::all()->last();
                            @endphp
                         <img class="flex h-10 m-3 mt-1 w-auto"alt="Logo" src="{{$information->logo_name ? asset('/storage/' . $information->logo_name) : asset('/img/Logo.png')}}">
                        </a>
                    </div>
                    
                        <div class="flex hidden sm:hidden md:hidden lg:flex">
                            <div class="">
                                <a href="{{route('workshops')}}" class="px-3 py-2 text-sm hover-3 font-semibold" aria-current="page">WORKSHOPS</a>
                                <a href="/newspage" class="hover:text-white px-3 py-2 text-sm hover-3 font-semibold">NEWS </a>
                                <a href="/members" class="hover:text-white px-3 py-2 text-sm hover-3 font-semibold">MEMBERS </a>
                                <a href="/about" class="hover:text-white px-3 py-2 text-sm hover-3 font-semibold">ABOUT US </a>
                            </div>
                        </div>
                </div>
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