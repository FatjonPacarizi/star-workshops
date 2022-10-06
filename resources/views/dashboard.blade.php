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
        <div class="w-full flex flex-col">
            <div class="p-6 text-center">
                @php
                $users = App\Models\User::find(1);
                @endphp
                <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{$users->count()}} </h1>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Users</p>
            </div>
            <div class="mx-10">
                <div class="flex text-center justify-around p-6  bg-white" id="chart">
                    <div class=" txt border-r border-indigo-100">
                    </div>
                </div>
            </div>
         </div>
         <<script src="https://code.highcharts.com/highcharts.js"></script>
         
         <figure class="highcharts-figure">
           <div id="container"></div>
           
         </figure>

         <script type="text/javascript">
         Highcharts.chart('container', {

            title: {
            text: 'New Workshops 2022'
             },
          
            yAxis: {
            title: {
                text: 'Number of New Workshops'
                }
            },
          
            xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
                ]
            },
          
            legend: {
              layout: 'vertical',
              align: 'right',
              verticalAlign: 'middle'
            },
          
            plotOptions: {
              series: {
                label: {
                  connectorAllowed: false
                },
                pointStart: 2010
              }
            },
          
            series: [{
              name: 'Installation & Developers',
              data: [43934, 48656, 65165, 81827, 112143, 142383,
                171533, 165174, 155157, 161454, 154610]
            }, {
              name: 'Manufacturing',
              data: [24916, 37941, 29742, 29851, 32490, 30282,
                38121, 36885, 33726, 34243, 31050]
            }, {
              name: 'Sales & Distribution',
              data: [11744, 30000, 16005, 19771, 20185, 24377,
                32147, 30912, 29243, 29213, 25663]
            }, {
              name: 'Operations & Maintenance',
              data: [null, null, null, null, null, null, null,
                null, 11164, 11218, 10077]
            }, {
              name: 'Other',
              data: [21908, 5548, 8105, 11248, 8989, 11816, 18274,
                17300, 13053, 11906, 10073]
            }],
          
            responsive: {
              rules: [{
                condition: {
                  maxWidth: 500
                },
                chartOptions: {
                  legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                  }
                }
              }]
            }
          
          });
         </script>
    </div>
</div>

@endsection