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
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>

<div class="flex flex-fixed w-full h-screen l border 0 bg-gray-100">
  <div class="w-3/12 md:block hidden bg-gray-200">
    <h1 class="text-center pt-2"><a href="/workshop/{{$workshops->id}}"><i class="fa-solid fa-square-caret-left text-red-500"></i>  {{$streaming->workshop->name}}</a></h1>

    <div class="bg-gray-200 pt-4 pb-4"> 
      <div class="h-fit pl-4 pt-2 pb-2">
        Introduction
      </div>
      <ul class="w-full"> 
        @foreach($streamings as $str)
        @if($str->status == 'free') 
        <a class="" href="/workshop/{{$workshops->id}}/streaming/{{$str->id}}">
        <li class="h-fit {{Request::segment(4) == $str->id ? 'bg-gray-300 font-medium' : ''}} p-4  ">   
          
              <span class="">@if($str->url != '')<i class="fa-solid fa-tv"></i>@else<i class="fa-solid fa-align-left"></i>@endif
               {{$str->title}} 
              </span>
            </li>
          </a>
        @endif
        @endforeach
      </ul>
    </div>
    <div class="bg-gray-200 pb-4"> 
      <div class="h-fit pl-4 pt-2 pb-2">
        Advance Course
      </div>
      <ul class="w-full">
      @foreach($streamings as $str)
        @if($str->status == 'paid')   
        <a href="/workshop/{{$workshops->id}}/streaming/{{$str->id}}">
        <li class="h-fit p-4  {{Request::segment(4) == $str->id ? 'bg-gray-300 font-medium' : ''}}">
              <span>@if($str->url != '')<i class="fa-solid fa-tv"></i>@else<i class="fa-solid fa-align-left"></i>@endif
              {{$str->title}}
              </span>
            </li>
          </a>
        @endif
        @endforeach
      </ul> 
    </div>
  </div>

  <div class="w-full md:w-9/12 overflow-y-auto">
      @yield('content')
  </div>

</div>
</body>
</html>