<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/icon.png') }}">

    <title></title>
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
<div class="w-3/12 h-screen overflow-y-scroll border border-red-700 bg-gray-200">
  <div class="flex flex-col"> 
  <div class="bg-gray-200 pt-4 pb-4"> 
      <div class="border-2 h-fit pl-4 border-red-700 hover:bg-red-200 pt-2 pb-2">
        Intro
      </div>
      <ul class="w-full">
        @foreach($streaming as $str)
        @if($str->status == 'free')
        <li class="border-2 h-fit pl-4 border-red-700 hover:bg-red-200 pt-2 pb-2">
          <a class="" href="/streaming/{{$str->id}}">
              <span class=""><i class="fa-solid fa-tv"></i>
               {{$str->title}}
              </span>
          </a>
        </li>
        @endif
        @endforeach
      </ul>
    </div>
    <div class="bg-gray-200 pt-4 pb-4"> 
      <div class="border-2 h-fit pl-4 border-red-700 hover:bg-red-200 pt-2 pb-2">
        Advance Course
      </div>
      <ul class="w-full">
        @foreach($streaming as $str)
        @if($str->status == 'paid')
        <li class="border-2 h-fit pl-4 border-red-700 hover:bg-red-200 pt-2 pb-2">
          <a class="" href="/streaming/{{$str->id}}">
              <span class=""><i class="fa-solid fa-tv"></i>
               {{$str->title}}
              </span>
          </a>
        </li>
        @endif
        @endforeach
        </li>
      </ul>
    </div>  
  </div>
</div>
</body>
</html>