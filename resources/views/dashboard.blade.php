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
        <div class="container p-5">     @php
            $users = App\Models\User::find(1);
            @endphp
            <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{$users->count()}} </h1>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Users</p>
            @php
            $workshops = App\Models\Workshop::find(1);
            @endphp
            <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{$workshops->count()}} </h1>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Workhops</p>
    
 
        <div  id="google-line-chart" style="width: 900px; height: 500px"></div>
 
    </div>
        </div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
 
        function drawChart() {
 
        var data = google.visualization.arrayToDataTable([
            ['Month Name', 'Register Workshop Count'],
 
                @php
                foreach($lineChart as $d) {
                    echo "['".$d->month_name."', ".$d->count."],";
                }
                @endphp
        ]);
 
        var options = {
          title: 'Register Workshops Month ',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
 
          var chart = new google.visualization.LineChart(document.getElementById('google-line-chart'));
 
          chart.draw(data, options);
        }
    </script>
    </div>
</div>

@endsection