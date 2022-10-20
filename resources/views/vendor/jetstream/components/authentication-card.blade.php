<div class="w-full min-h-screen flex flex-col justify-center items-center pt-0 bg-gray-100">
    <div class=" sm:max-w-md mt-6 px-10  py-4 relative flex justify-center">
    <a href="/" class="absolute top-1/2 left-0 -mt-2 "> <i class="fa-solid fa-house fa-xl text-gray-400"></i></a>
        {{ $logo }}
    </div>

    <div class=" sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>