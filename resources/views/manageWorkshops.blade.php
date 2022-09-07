@php
  $date = new DateTime("now", new DateTimeZone('Europe/Tirane') );
  
@endphp

@extends('layouts.app')
  @section('content')
  <div class="w-full h-full p-6  flex flex-col  items-center ">
    {{-- {{dd(request()->has('pastsWorkshopsPage'))}} --}}
    @php  
      $tab = 0;
      if(session()->has('tab')) {$tab = session('tab'); }
      else{
         if(request()->has('pastsWorkshopsPage')) $tab = 1;
      }
      
    @endphp


    <div class="w-full bg-white rounded pb-4 " x-data="{
      tab:{{$tab}},
      active : 'bg-gray-100  rounded-t text-gray-900 border-b-2 border-sky-700',
      inactive: 'text-gray-400 hover:text-gray-600 border-t  border-l border-r rounded-t'
     }">
     <div class="w-full flex justify-between border-b">
      <h1 class = "p-3 text-slate-900">Workshop Managment</h1>
     <div class="flex items-end">
      <div class="flex">
        <div class="flex">
          @php  
          $upcomingtab = 1;
          $pasttab = 1;

          if(request()->has('upcomingWorkshopsPage')) $upcomingtab = request('upcomingWorkshopsPage');
          if(request()->has('pastsWorkshopsPage')) $pasttab = request('pastsWorkshopsPage');

        @endphp
        <button  onClick = "changeURL('?upcomingWorkshopsPage={{$upcomingtab}}')" :class = "tab === 0 ? active: inactive" class = "px-5 h-8 flex items-center" @click="tab = 0">Upcoming</button>
        <button  onClick = "changeURL('?pastsWorkshopsPage={{$pasttab}}')"  :class = "tab === 1 ? active: inactive" class = "px-5 h-8" @click="tab = 1 ">Pasts</button>
        </div>
        
      </div>
      <a class="mx-5 mb-1 flex items-center" href="{{route('adminsuperadmin.showInsert')}}">
        <h6 class = "text-2xl mr-1 -mt-1 text-gray-400 ">+</h6>
        <h2 class = "text-gray-400 ">Create Workshop</h2>
        
      </a>
     </div>
     </div>

      <div class="w-full px-5 pt-5"  x-show="tab === 0">
            <livewire:filter-upcomings-workshops>
            <livewire:show-upcomings-workshops/>

      </div>

  <div class="w-full px-5 pt-5"  x-show="tab === 1">
    <livewire:filter-pasts-workshops>
    <livewire:show-pasts-workshops/>

</div>
</div>
       

        @can('is_super_admin')
         <div class="w-full bg-white border border-gray-200 rounded pb-4 my-12">
      <div class="w-full flex justify-between items-center  border-b border-gray-200 mb-4">
        <h1 class = "p-3 text-slate-900">Workshop Deleted </h1>
      </div>


             <div class="w-full flex justify-center">
            <table class="w-full mx-4  font-thin">
              <tr class="border-y border-gray-200 ">
                <td class="font-bold p-3 w-1/2">Workshop Name</td>
                <td class="font-bold">Workshop deleted</td>
                <td class="font-bold">Author</td>
                <td class="font-bold w-72 ">Actions</td>
              </tr>
            
            @foreach($workshops1 as $workshop1)
            <tr class = 'border-b border-gray-200'>
              <td class="p-3 ">{{ \Illuminate\Support\Str::limit($workshop1->name, 50, $end='...') }}</td>
              <td class="text-blue-600">{{\Carbon\Carbon::parse($workshop1->deleted_at)->format('d F Y h:m') }}</td>
              <td class="text-blue-600">{{$workshop1->user->name}}</td>
              <td class = "flex items-center " >
                <form method="POST" action="/workshopManage/{{$workshop1->id}}/restore">
                @csrf
                
                 
              <button class="bg-sky-500 text-white px-3 p-2  text-xs rounded mr-3 my-2 hover:bg-blue-500 opacity-1">
              <i class="fa-solid fa-trash-can-arrow-up"></i>
                      Restore
                    </button>
                  </form>
                <form method="POST" action="/forcedelete/{{$workshop1->id}}">
                  @csrf
                  @method('DELETE')
                  <button class="bg-red-500 text-white p-2 text-xs rounded mr-3 hover:bg-red-600">
                    <i class="fa-solid fa-trash-can  fa-md"></i>
                    Force Delete
                  </button>
                </form>
              </td>
              
            </tr>
            @endforeach
    </table>
  </div><div class="flex justfy-center p-3"
                            {{ $workshops1->links() }}
                  </div>
        </div>
        
      </div>
      @endcan
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