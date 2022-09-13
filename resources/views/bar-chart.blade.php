@extends('layouts.app')
@section('content')
<div class="txt m-2 p-4 ">
                    @php
                    $workshops = App\Models\Workshop::whereNull('deleted_at')->get();
             @endphp
                <h1 class=" mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{$workshops->count()}}</h1>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Workshop</p>
                
            </div>
           
    <center><h1 style="color:red;">Highcharts in Laravel 8 Example</h1></center>
   
	  <div class="py-3 px-5 bg-gray-50"id="container">Line chart</div>
  <canvas class="p-10" ></canvas>
</div>


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

@endsection
