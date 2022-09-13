@extends('layouts.app')
@section('content')
<div class="w-full flex justify-left items-left m-3">
    <div class="p-6 flex h-fit bg-white w-full " >
        <div class="txt items-center border-r border-indigo-100">
        <span class="inline-flex rounded-md">
            <div class="p-6 max-w-sm bg-white ">
                <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{ Auth::user()->name }}<h1>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Auth::user()->email }}</p>
                
            </div>
        </span>
        </div>
        <div class="    ">
            <div class="flex text-center justify-around p-6  bg-white">
            <div class="txt m-2 p-4 ">
                    @php
                    $workshops = App\Models\Workshop::whereNull('deleted_at')->get();
             @endphp
                <h1 class=" mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{$workshops->count()}}</h1>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Workshop</p>
                
            </div>
            <div class="txt border-r border-indigo-100">

            </div>
            <div class="txt m-2 p-4 ">
                @php
                   $users = App\Models\User::find(1);
            @endphp
                <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{$users->count()}} </h1>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Users</p>
            </div>
            
            </div>
            <div class="m-3  items-center">
                <div class="p-6  bg-white" id="container">
                <script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">
    var users = <?php echo json_encode($users)?>;
    Highcharts.chart('container', {
        title: {
            text: 'New User 2021'
        },
        subtitle: {
            text: 'Bluebird youtube channel'
        },
        xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ]
        },
        yAxis: {
            title: {
                text: 'Number of New Users'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'New Users',
            data: users
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
        </div>
    </div>
</div>

@endsection