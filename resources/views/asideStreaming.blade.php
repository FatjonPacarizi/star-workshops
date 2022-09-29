<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/icon.png') }}">
    <title>Aside</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans h-full antialiased  bg-[#F8F9FA]">
    <x-jet-banner />
    <div class="h-full  ">
        <!-- Page Content -->
        <div class="w-full h-screen flex fixed  ">
            <aside class="w-3/12 h-screen overflow-y-scroll border border-red-700 ">
            <div class="border border-red-700 bg-gray-700">
            <div class=" border-2 h-fit pl-4 border-red-700">
            <h2 >Laravel Testing For Beginners: PHPUnit, Pest, TDD</h2>
    <!-- Course Progress -->
  </div>
  <!-- Lecture list on courses page (enrolled user) -->

  <div class="flex flex-col">
    
    <div class="bg-gray-700 pt-4 pb-4"> 
      <div class="border-2 h-fit pl-4 border-red-700 hover:bg-red-200 pt-2 pb-2">
        Intro
      </div>

      <ul class="w-full">
        <li class="border-2 h-fit pl-4 border-red-700 hover:bg-red-200 pt-2 pb-2">
          <a class="" href="">
              <span class=""><i class="fa-solid fa-tv"></i>
                What's Inside This Course
                What's Inside This Course
              </span>
          </a>
        </li>
        <li class="border-2 h-fit pl-4 border-red-700 hover:bg-red-200 pt-2 pb-2">
          <a class="" href="">
              <span class=""><i class="fa-solid fa-tv"></i>
                What's Inside This Course
                What's Inside This Course
              </span>
          </a>
        </li>
        <li class="border-2 h-fit pl-4 border-red-700 hover:bg-red-200 pt-2 pb-2">
          <a class="" href="">
              <span class=""><i class="fa-solid fa-tv"></i>
                What's Inside This Course
                What's Inside This Course
              </span>
          </a>
        </li>
        <li class="border-2 h-fit pl-4 border-red-700 hover:bg-red-200 pt-2 pb-2">
          <a class="" href="">
              <span class=""><i class="fa-solid fa-tv"></i>
                What's Inside This Course
                What's Inside This Course
              </span>
          </a>
        </li>
        <li class="border-2 h-fit pl-4 border-red-700 hover:bg-red-200 pt-2 pb-2">
          <a class="" href="">
              <span class=""><i class="fa-solid fa-tv"></i>
                What's Inside This Course
                What's Inside This Course
              </span>
          </a>
        </li>

      </ul>
    </div>
 
    <div class="bg-gray-700 pt-4 pb-4">
      <div class="">
        Practical Project: Testing of CRUD
      </div>
      
      <ul class="w-full">
        <li class="border-2 h-12  border-red-700">
          <a class="item" href="" >
            <div class="">
              <span class="">
                Our First Test: Products Table - Empty or Not?
              </span>
            </div>
          </a>
        </li>
        <li class="border-2 h-12  border-red-700">
          <a class="item" href="" >
            <div class="">
              <span class="">
                Our First Test: Products Table - Empty or Not?
              </span>
            </div>
          </a>
        </li>
        <li class="border-2 h-12  border-red-700">
          <a class="item" href="" >
            <div class="">
              <span class="">
                Our First Test: Products Table - Empty or Not?
              </span>
            </div>
          </a>
        </li>
        <li class="">
          <a class="item" href="" >
            <div class="">
              <span class="">
                Our First Test: Products Table - Empty or Not?
              </span>
            </div>
          </a>
        </li>

      </ul>
    </div>  

  </div>

  <div class="w-full   overflow-y-scroll border border-red-700"></div>
</div>


