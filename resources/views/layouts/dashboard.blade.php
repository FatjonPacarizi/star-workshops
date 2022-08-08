<x-app-layout>
    <div class="w-full h-screen flex ">
        <aside class=" bg-[#3c4b64]  w-80 ">
                <div class="w-full bg-[#303C54] p-5 flex justify-center text-white">
                    <span class="inline-flex">
                        <i class="inline-flex"></i></span>
                                    Core <sup>UI</sup>
                </div>
            <div class="menu is-menu-main px-5">
                <ul class="menu-list" >
                    <li class=" bg-slate-700 ">
                        <a href="{{ route('dashboard') }}" class="flex pt-2 pb-2 bg-[#3c4b64] text-white">
                            <span class="inline-flex items-center justify-center h-6 w-6"><i class="mdi mdi-speedometer inline-flex"></i></span>
                            <span class="grow">Dashboard</span>
                        </a>
                    </li>
                </ul>
    
                <p class="text-xs leading-4 p-3  text-gray-400 uppercase ">System</p>
                <ul class="menu-list text-white bg-[#303C54]">
                    <li class="--set-active-tables-html">
                        <a href="#" class="flex pt-2 pb-2  bg-[#3c4b64] active:bg-slate-600  hover:bg-slate-600 ">
                            <span class="inline-flex items-center justify-center h-6 w-6"><i class="mdi mdi-account-outline inline-flex"></i></span>
                            <span class="grow">Access</span>
                            <span class="inline-flex items-center justify-center h-6 w-6"><i class="mdi mdi-chevron-right inline-flex"></i></span>
                        </a>
                    </li>
                    <li class="--set-active-tables-html">
                        <a href="#" class="flex pt-2 pb-2 bg-[#3c4b64] active:bg-slate-600   hover:bg-slate-600 ">
                            <span class="inline-flex items-center justify-center h-6 w-6"><i class="mdi mdi-format-list-checkbox inline-flex"></i></span>
                            <span class="grow">Logs</span>
                            <span class="inline-flex items-center justify-center h-6 w-6"><i class="mdi mdi-chevron-right inline-flex right"></i></span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
    <div class="w-full flex justify-center items-center">
        @yield('content')
    </div>
    </div>
    </x-app-layout>