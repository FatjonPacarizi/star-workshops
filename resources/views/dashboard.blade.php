@extends('layouts.app')
@section('content')
<div class="w-full flex justify-left items-left">
    <div class="w-full p-6  h-fit">
        <div class="flex items-center  justify-around mb-4">
            <div class="w-1/4 px-3">
            <div class="flex items-center justify-between rounded-xl  p-4 bg-white" style = "box-shadow: rgba(0, 0, 0, 0.1) 50px 20px 100px;">
                <div class = "">
                    <p>Users</p>
                    <h2 class = "text-black text-xl font-bold flex items-center">{{$users}} <span class = "text-xs text-green-400 ml-2">in total</span></h2>
                </div>
                <div>
                    <div class="px-2 py-2.5 rounded-lg ml-2 text-white bg-gradient-to-r from-purple-500 to-pink-500 shadow-md">   
                         <i class="mdi mdi-account-outline mx-1 fa-lg"></i>
                    </div>

                </div>
             </div>
            </div>
            <div class="w-1/4 px-3">
                <div class=" flex items-center justify-between rounded-xl  p-4 bg-white" style = "box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 80px;">
                   <div class = "">
                       <p>Workshops</p>
                       <h2 class = "text-black text-xl font-bold flex items-center">{{$totalWorkshops}}  <span class = "text-xs text-green-400 ml-2">in total</span></h2>
                   </div>
                   <div>
                       <div class="px-2 py-2.5 rounded-lg ml-2 text-white bg-gradient-to-r from-purple-500 to-pink-500 shadow-md">   
                           <i class="mdi mdi-widgets inline-flex mx-1 fa-lg"></i>
                       </div>
   
                   </div>
                </div>
                </div>
             <div class="w-1/4 px-3">
             <div class=" flex items-center justify-between rounded-xl  p-4 bg-white" style = "box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 80px;">
                <div class = "">
                    <p>Users statistics</p>
                    <h2 class = "text-black text-xl font-bold flex items-center">{{$usersThisMonthRegistered}}  <span class = "text-xs text-green-400 ml-2 flex flex-wrap">+{{\Illuminate\Support\Str::limit($usersThisMonthRegistered/$users*100, 4, $end='')}}% more last 30 days</span></h2>
                </div>
                <div>
                    <div class="px-2 py-2.5 rounded-lg ml-2 text-white bg-gradient-to-r from-purple-500 to-pink-500 shadow-md">   
                         <i class="mdi mdi-account-outline mx-1 fa-lg"></i>
                    </div>

                </div>
             </div>
             </div>
             <div class="w-1/4 px-3">
             <div class="flex items-center justify-between rounded-xl  p-4 bg-white" style = "box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 80px;">
                <div class = "">
                    <p>Workshops statistics</p>
                    <h2 class = "text-black text-xl font-bold flex items-center">{{$workshopsThisMonthRegistered}}  <span class = "text-xs text-green-400 ml-2 break-words">+{{\Illuminate\Support\Str::limit($workshopsThisMonthRegistered/$totalWorkshops*100, 4, $end='')}}% more last 30 days</span></h2>
                </div>
                <div>
                    <div class="px-2 py-2.5 rounded-lg ml-2 text-white bg-gradient-to-r from-purple-500 to-pink-500 shadow-md">   
                        <i class="mdi mdi-widgets inline-flex mx-1 fa-lg"></i>
                    </div>

                </div>
             </div>
            </div>
             
        </div>
       
     
       
        <div class="">
        <div  id="google-line-chart" style="width: 900px; height: 500px"></div>
                <div class="txt border-r border-indigo-100">
                </div>
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