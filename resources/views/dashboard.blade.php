<x-app-layout>
    <div class="border border-red-200">
        <div class="max-w-7xl flex">

                    <aside class="opacity-100 bg-[#3c4b64] h-screen  pt-6 left-0 pb-8 w-60 z-40 transition-all transition ease-[cubic-bezier(.4,0,.2,1)] duration-150">
                        <div class="opacity-100 bg-[#3c4b64] flex flex-row items-center flex-1 h-14 px-3 pr-3 opacity-100 text-white opacity w-full text-white">
                            <div>
                <span class="inline-flex items-center justify-center h-6 w-6">
                    <i class="mdi mdi-copyright inline-flex"></i></span>
                                Core <sup>UI</sup>
                            </div>
                        </div>
                        <div class="menu is-menu-main">
                            <ul class="menu-list" >
                                <li class="opacity-100 bg-slate-700 ">
                                    <a href="{{ route('dashboard') }}" class="flex pt-2 pb-2 opacity-100 bg-[#3c4b64]  opacity-100 opacity-100 text-white">
                                        <span class="inline-flex items-center justify-center h-6 w-6"><i class="mdi mdi-speedometer inline-flex"></i></span>
                                        <span class="grow">Dashboard</span>
                                    </a>
                                </li>
                            </ul>

                            <p class="text-xs leading-4 p-3 opacity-100 text-gray-400 uppercase ">System</p>
                            <ul class="menu-list text-white">
                                <li class="--set-active-tables-html">
                                    <a href="#" class="flex pt-2 pb-2 opacity-100 bg-[#3c4b64] active:bg-slate-600 opacity-100 hover:bg-slate-600 opacity-100">
                                        <span class="inline-flex items-center justify-center h-6 w-6"><i class="mdi mdi-account-outline inline-flex"></i></span>
                                        <span class="grow">Access</span>
                                        <span class="inline-flex items-center justify-center h-6 w-6"><i class="mdi mdi-chevron-left inline-flex"></i></span>
                                    </a>
                                </li>
                                <li class="--set-active-tables-html">
                                    <a href="#" class="flex pt-2 pb-2 opacity-100 bg-[#3c4b64] active:bg-slate-600 opacity-100 hover:bg-slate-600 opacity-100">
                                        <span class="inline-flex items-center justify-center h-6 w-6"><i class="mdi mdi-format-list-checkbox inline-flex"></i></span>
                                        <span class="grow">Logs</span>
                                        <span class="inline-flex items-center justify-center h-6 w-6"><i class="mdi mdi-chevron-left inline-flex right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                <div class="border border-black-200 w-full flex justify-center items-center">

                </div>
            </div>
        </div>

</x-app-layout>
