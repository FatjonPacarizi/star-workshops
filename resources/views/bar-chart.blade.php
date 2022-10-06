@extends('layouts.app')
@section('content')
<div class="w-full flex justify-left items-left m-3">
    <div class="p-6 flex h-fit bg-white w-full ">
        <div class="txt items-center border-r border-indigo-100">
        <span class="inline-flex rounded-md">
            <div class="p-6 max-w-sm bg-white ">
                <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{ Auth::user()->name }}<h1>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Auth::user()->email }}</p> 
            </div>
        </span>
        </div>
        <div class="txt m-2 p-4 ">
                @php
                   $users = App\Models\User::find(1);
            @endphp
                <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{$users->count()}} </h1>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Users</p>
            </div>
        <div class="">
            <div class="flex text-center justify-around p-6  bg-white"id="chart">
            <div class="txt border-r border-indigo-100">
            </div>
            </div> 
        </div>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        
        <figure class="highcharts-figure">
          <div id="container"></div>
          <p class="highcharts-description">
            Basic line chart showing trends in a dataset. This chart includes the
            <code>series-label</code> module, which adds a label to each line for
            enhanced readability.
          </p>
        </figure>

    </div>
</div>
@endsection