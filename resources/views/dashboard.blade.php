@extends('layouts.app')
@section('content')
<div class="w-full flex justify-left items-left">
    <div class="w-full p-6  h-fit">
        <div class="flex items-center  justify-around mb-4">
            <div class="w-1/4 px-3">
            <div class="flex items-center justify-between rounded-xl  p-4 bg-white" style = "box-shadow: rgba(0, 0, 0, 0.1) 50px 20px 100px;">
                <div class = "">
                    <p>Users</p>
                    <h2 class = "text-black text-xl font-bold flex items-center">{{$users}} <span class = "text-xs text-green-400 ml-3">in total</span></h2>
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
                       <h2 class = "text-black text-xl font-bold flex items-center">{{$totalWorkshops}}  <span class = "text-xs text-green-400 ml-3">in total</span></h2>
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
                    <h2 class = "text-black text-xl font-bold flex items-center">{{$usersThisMonthRegistered}}  <span class = "text-xs text-green-400 ml-3 flex flex-wrap">+{{\Illuminate\Support\Str::limit($usersThisMonthRegistered/$users*100, 4, $end='')}}% more last 30 days</span></h2>
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
                    <h2 class = "text-black text-xl font-bold flex items-center">{{$workshopsThisMonthRegistered}}  <span class = "text-xs text-green-400 ml-3 break-words">+{{\Illuminate\Support\Str::limit($workshopsThisMonthRegistered/$totalWorkshops*100, 4, $end='')}}% more last 30 days</span></h2>
                </div>
                <div>
                    <div class="px-2 py-2.5 rounded-lg ml-2 text-white bg-gradient-to-r from-purple-500 to-pink-500 shadow-md">   
                        <i class="mdi mdi-widgets inline-flex mx-1 fa-lg"></i>
                    </div>

                </div>
             </div>
            </div>
             
        </div>
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
            <div class="flex text-center justify-around p-6  bg-white" id="chart">
                <div class="txt border-r border-indigo-100">
                </div>
            </div>
        </div>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script type="text/javascript">
            // var workshops = <?php {{-- echo json_encode($workshops) --}} ?>;
    // Highcharts.chart('chart', {
    //     title: {
    //         text: 'New Workshops 2022'
    //     },
      
    //     xAxis: {
    //         categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
    //             'October', 'November', 'December'
    //         ]
    //     },
    //     yAxis: {
    //         title: {
    //             text: 'Number of New Workshops'
    //         }
    //     },
    //     legend: {
    //         layout: 'vertical',
    //         align: 'right',
    //         verticalAlign: 'middle'
    //     },
    //     plotOptions: {
    //         series: {
    //             allowPointSelect: true
    //         }
    //     },
    //     series: [{
    //         name: 'New Workshop',
    //         data: workshops
    //     }],
    //     responsive: {
    //         rules: [{
    //             condition: {
    //                 maxWidth: 500
    //             },
    //             chartOptions: {
    //                 legend: {
    //                     layout: 'horizontal',
    //                     align: 'center',
    //                     verticalAlign: 'bottom'
    //                 }
    //             }
    //         }]
    //     }
    // });
        </script>
    </div>
</div>

@endsection