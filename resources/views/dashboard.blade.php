@extends('layouts.app')
@section('content')
<div class="w-full flex justify-left items-left">
    <div class="w-full p-6  h-fit">
        <div class="flex items-center  justify-around mb-4">
            <div class="w-1/4 px-3">
                <div class="flex items-center justify-between rounded-xl  p-4 bg-white"
                    style="box-shadow: rgba(0, 0, 0, 0.1) 50px 20px 100px;">
                    <div class="">
                        <p>Users</p>
                        <h2 class="text-black text-xl font-bold flex items-center">{{$users}} <span
                                class="text-xs text-green-400 ml-2">in total</span></h2>
                    </div>
                    <div>
                        <div
                            class="px-2 py-2.5 rounded-lg ml-2 text-white bg-gradient-to-r from-purple-500 to-pink-500 shadow-md">
                            <i class="mdi mdi-account-outline mx-1 fa-lg"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="w-1/4 px-3">
                <div class=" flex items-center justify-between rounded-xl  p-4 bg-white"
                    style="box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 80px;">
                    <div class="">
                        <p>Workshops</p>
                        <h2 class="text-black text-xl font-bold flex items-center">{{$totalWorkshops}} <span
                                class="text-xs text-green-400 ml-2">in total</span></h2>
                    </div>
                    <div>
                        <div
                            class="px-2 py-2.5 rounded-lg ml-2 text-white bg-gradient-to-r from-purple-500 to-pink-500 shadow-md">
                            <i class="mdi mdi-widgets inline-flex mx-1 fa-lg"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="w-1/4 px-3">
                <div class=" flex items-center justify-between rounded-xl  p-4 bg-white"
                    style="box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 80px;">
                    <div class="">
                        <p>Users statistics</p>
                        <h2 class="text-black text-xl font-bold flex items-center">{{$usersThisMonthRegistered}} <span
                                class="text-xs text-green-400 ml-2 flex flex-wrap">+{{\Illuminate\Support\Str::limit($usersThisMonthRegistered/$users*100,
                                4, $end='')}}% more last 30 days</span></h2>
                    </div>
                    <div>
                        <div
                            class="px-2 py-2.5 rounded-lg ml-2 text-white bg-gradient-to-r from-purple-500 to-pink-500 shadow-md">
                            <i class="mdi mdi-account-outline mx-1 fa-lg"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="w-1/4 px-3">
                <div class="flex items-center justify-between rounded-xl  p-4 bg-white"
                    style="box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 80px;">
                    <div class="">
                        <p>Workshops statistics</p>
                        <h2 class="text-black text-xl font-bold flex items-center">{{$workshopsThisMonthRegistered}}
                            <span
                                class="text-xs text-green-400 ml-2 break-words">+{{\Illuminate\Support\Str::limit($workshopsThisMonthRegistered/$totalWorkshops*100,
                                4, $end='')}}% more last 30 days</span>
                        </h2>
                    </div>
                    <div>
                        <div
                            class="px-2 py-2.5 rounded-lg ml-2 text-white bg-gradient-to-r from-purple-500 to-pink-500 shadow-md">
                            <i class="mdi mdi-widgets inline-flex mx-1 fa-lg"></i>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        @php

        $data = array(0,0,0,0,0,0,0,0,0,0,0,0);
        $i=0;
        foreach ($lineChart as $item) {
        switch ($item->month_name) {
        case 'January':
        $data[0] = $item->count;
        break;

        case 'February':
        $data[1] = $item->count;
        break;

        case 'March':
        $data[2] = $item->count;
        break;

        case 'April':
        $data[3] = $item->count;
        break;

        case 'May':
        $data[4] = $item->count;
        break;

        case 'June':
        $data[5] = $item->count;
        break;
        case 'July':
        $data[6] = $item->count;
        break;
        case 'August':
        $data[7] = $item->count;
        break;
        case 'September':
        $data[8] = $item->count;
        break;
        case 'October':
        $data[9] = $item->count;
        break;

        default:
        $data[10] = $item->count;
        break;
        }
        $data[$i] = $item->count;
        $i++;
        echo $item;
        }

        @endphp
        <div class="line-chart">
            <div class="aspect-ratio">
                <canvas id="chart"></canvas>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script type="text/javascript">
        var chart    = document.getElementById('chart').getContext('2d'),
    gradient = chart.createLinearGradient(0, 0, 0, 450);

gradient.addColorStop(0, 'rgba(255, 0,0, 0.5)');
gradient.addColorStop(0.5, 'rgba(255, 0, 0, 0.25)');
gradient.addColorStop(1, 'rgba(255, 0, 0, 0)');


var data  = {
    labels: [ 'January', 'February', 'March', 'April', 'May', 'June','July', 'August', 'September', 'October' ],
    datasets: [{
			label: 'Custom Label Name',
			backgroundColor: gradient,
			pointBackgroundColor: 'white',
			borderWidth: 1,
			borderColor: '#911215',
			data: "<?php foreach ($data as $item) {echo $item;} ?>"
    }]
};


var options = {
	responsive: true,
	maintainAspectRatio: true,
	animation: {
		easing: 'easeInOutQuad',
		duration: 520
	},
	scales: {
		xAxes: [{
			gridLines: {
				color: 'rgba(200, 200, 200, 0.05)',
				lineWidth: 1
			}
		}],
		yAxes: [{
			gridLines: {
				color: 'rgba(200, 200, 200, 0.08)',
				lineWidth: 1
			}
		}]
	},
	elements: {
		line: {
			tension: 0.4
		}
	},
	legend: {
		display: false
	},
	point: {
		backgroundColor: 'white'
	},
	tooltips: {
		titleFontFamily: 'Open Sans',
		backgroundColor: 'rgba(0,0,0,0.3)',
		titleFontColor: 'red',
		caretSize: 5,
		cornerRadius: 2,
		xPadding: 10,
		yPadding: 10
	}
};


var chartInstance = new Chart(chart, {
    type: 'line',
    data: data,
		options: options
});
    </script>
</div>
</div>

@endsection