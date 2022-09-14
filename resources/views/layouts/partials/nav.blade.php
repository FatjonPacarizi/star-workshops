@extends('welcome')
<header>
    <!-- This example requires Tailwind CSS  -->
    <nav class="bg-white">
        <div class="mx-auto max-w-container px-4 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <div class="md:hidden flex items-center">
	<button class="outline-none mobile-menu-button sm:hidden">
		<svg
			class="w-6 h-6 text-gray-500"
			x-show="!showMenu"
			fill="none"
			stroke-linecap="round"
			stroke-linejoin="round"
			stroke-width="2"
			viewBox="0 0 24 24"
			stroke="currentColor"
		>
		<path d="M4 6h16M4 12h16M4 18h16"></path>
		</svg>
	</button>
</div>
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('landing' ) }}">
                            @php
                            $information = App\Models\Informations::all()->last();
                              @endphp
                         <img class="block h-10 m-3 mt-1 w-auto"alt="Logo" src="{{$information->logo_name ? asset('/storage/' . $information->logo_name) : asset('/img/Logo.png')}}">
                        </a>
                    </div>
                    <div class="flex-shrink-0 flex items-center">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-red-700 text-white", Default: "text-white hover:bg-red-700 hover:text-white" -->
                            <a href="{{route('workshops')}}" class="text-red-700 hover:text-red-700 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">WORKSHOPS</a>
                            <a href="/newspage" class="text-red-700 hover:text-red-700 px-3 py-2 rounded-md text-sm font-medium">NEWS</a>
                            <a href="/members" class="text-red-700 hover:text-red-700 px-3 py-2 rounded-md text-sm font-medium">MEMBERS</a>
                            <a href="/about" class="text-red-700 hover:text-red-700 px-3 py-2 rounded-md text-sm font-medium">ABOUT US</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="hidden mobile-menu">
	<ul class="">
        <li><a href="{{route('workshops')}}" class="text-red-700 hover:text-red-700 block text-sm px-2 py-4 transition duration-300" aria-current="page">WORKSHOPS</a></li>
        <li><a href="/newspage" class="text-red-700 hover:text-red-700 block text-sm px-2 py-4 transition duration-300">NEWS</a></li>
        <li><a href="/members" class="text-red-700 hover:text-red-700 block text-sm px-2 py-4 transition duration-300">MEMBERS</a></li>
        <li><a href="/about" class="text-red-700 hover:text-red-700 block text-sm px-2 py-4 transition duration-300">ABOUT US</a></li>   
    </ul>
</div>
    </nav>
</header>
<script>
	// Grab HTML Elements
	const btn = document.querySelector("button.mobile-menu-button");
	const menu = document.querySelector(".mobile-menu");
	// Add Event Listeners
	btn.addEventListener("click", () => {
	menu.classList.toggle("hidden");
	});
</script>