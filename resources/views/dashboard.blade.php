@extends('layouts.app')
@section('content')
<div class="w-full flex justify-left items-left m-3">
    <div class="p-6 flex h-fit bg-white w-full " >
        <div class="txt items-center border-r border-indigo-100">
        <span class="inline-flex rounded-md">
            <div class="p-6 max-w-sm bg-white ">
                <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ Auth::user()->name }}<h1>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Auth::user()->email }}</p>
                
            </div>
        </span>
        </div>
        <div class="    ">
            <div class="flex text-center justify-around p-6  bg-white">
            <div class="txt m-2 p-4 ">
                    @php
                    $workshops = App\Models\Workshop::find(1);
             @endphp
                <h1 class=" mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$workshops->count()}}</h1>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Workshop</p>
                
            </div>
            <div class="txt border-r border-indigo-100">

            </div>
            <div class="txt m-2 p-4 ">
                @php
                   $users = App\Models\User::find(1);
            @endphp
                <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$users->count()}} </h1>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Users</p>
            </div>
            
            </div>
            <div class="m-3  items-center">
                <div class="p-6  bg-white  ">
                    <img class="object-cover w-full" alt="Map" src="{{ asset('img/chart.png') }}">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection