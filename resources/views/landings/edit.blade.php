@extends('layouts.app')
  @section('content')
<script src="{{ asset('js/tinymce/tinymce.js') }}"></script>
  <div class="w-full h-screen px-10  ">

             <div  x-data="{
              tab:0,
              active : 'bg-white shadow',
              inactive: ' hover:shadow '
             }">
               
                <div class="w-full flex mt-5 items-center">
               
                <button :class = "tab === 0 ? active: inactive" class = "px-5 h-8 ml-1 rounded-xl flex items-center" @click="tab = 0">Section 1</button>
                <button :class = "tab === 1 ? active: inactive" class = "px-5 h-8 ml-1 rounded-xl flex items-center" @click="tab = 1">Section 2</button>
                <button :class = "tab === 2 ? active: inactive" class = "px-5 h-8 ml-1 rounded-xl flex items-center" @click="tab = 2">Section 3</button>
                <button :class = "tab === 3 ? active: inactive" class = "px-5 h-8 ml-1 rounded-xl flex items-center" @click="tab = 3">Section 4</button>
                <button :class = "tab === 4 ? active: inactive" class = "px-5 h-8 ml-1 rounded-xl flex items-center" @click="tab = 4">Section 5</button>
                <button :class = "tab === 5 ? active: inactive" class = "px-5 h-8 ml-1 rounded-xl flex items-center" @click="tab = 5">Section 6</button>
                <button :class = "tab === 6 ? active: inactive" class = "px-5 h-8 ml-1 rounded-xl flex items-center" @click="tab = 6">Section 7</button>
                <button :class = "tab === 7 ? active: inactive" class = "px-5 h-8 ml-1 rounded-xl flex items-center" @click="tab = 7">Section 8</button>

              </div>
            

                <div x-show="tab === 0">
                <livewire:landing.section1-component/>
                </div>

                <div x-show="tab === 1">
                <livewire:landing.section2-component/>
                </div>

                <div x-show="tab === 2">
                <livewire:landing.section3-component/>
                </div>

                <div x-show="tab === 3">
                <livewire:landing.section4-component/>
                </div>

                <div x-show="tab === 4">
                <livewire:landing.section5-component/>
                </div>

                <div x-show="tab === 5">
                <livewire:landing.section6-component/>
                </div>

                <div x-show="tab === 6">
                <livewire:landing.section7-component/>
                </div>

                <div x-show="tab === 7">
                <livewire:landing.section8-component/>
                </div>

              
        </div>
      </div>
            
      <script>
        function changeURL($param){
        if (history.pushState) {
             var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + $param;
             window.history.pushState({path:newurl},'',newurl);
         }
       }
         </script>
          
    
@endsection
