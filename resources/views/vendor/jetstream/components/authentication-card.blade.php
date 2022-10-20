<div class="w-full px-3 min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 relative flex justify-center">
    <a href="/" class="absolute top-1/2 left-2.5 -mt-2"> <i class="fa-solid fa-house fa-xl text-gray-400"></i></a>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden rounded-lg">
        {{ $slot }}
    </div>
</div>