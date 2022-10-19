@extends('layouts.app')
@section('content')
<div class="w-full flex justify-left items-left">
  <div class="w-full p-6  h-fit">
    <div class="flex flex-wrap items-center  justify-around mb-4">
      <div class="w-full md:w-1/2 lg:w-1/4 mb-5 px-3">
        <div class="flex items-center justify-between rounded-xl  p-4 bg-white"
          style="box-shadow: rgba(0, 0, 0, 0.1) 50px 20px 100px;">
          <div class="">
            <p>Users</p>
            <h2 class="text-black text-xl font-bold flex items-center">{{$users}} <span
                class="text-xs text-green-400 ml-2">in total</span></h2>
          </div>
          <div>
            <div class="px-2 py-2.5 rounded-lg ml-2 text-white bg-gradient-to-r from-purple-500 to-pink-500 shadow-md">
              <i class="mdi mdi-account-outline mx-1 fa-lg"></i>
            </div>

          </div>
        </div>
      </div>
      <div class="w-full md:w-1/2 lg:w-1/4 mb-5 px-3">
        <div class=" flex items-center justify-between rounded-xl  p-4 bg-white"
          style="box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 80px;">
          <div class="">
            <p>Workshops</p>
            <h2 class="text-black text-xl font-bold flex items-center">{{$totalWorkshops}} <span
                class="text-xs text-green-400 ml-2">in total</span></h2>
          </div>
          <div>
            <div class="px-2 py-2.5 rounded-lg ml-2 text-white bg-gradient-to-r from-purple-500 to-pink-500 shadow-md">
              <i class="mdi mdi-widgets inline-flex mx-1 fa-lg"></i>
            </div>

          </div>
        </div>
      </div>
      <div class="w-full md:w-1/2 lg:w-1/4 mb-5 px-3">
        <div class=" flex items-center justify-between rounded-xl  p-4 bg-white"
          style="box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 80px;">
          <div class="">
            <p>Users statistics</p>
            <h2 class="text-black text-xl font-bold flex items-center">{{$usersThisMonthRegistered}} <span
                class="text-xs text-green-400 ml-2 flex flex-wrap">+{{\Illuminate\Support\Str::limit($usersThisMonthRegistered/$users*100,
                4, $end='')}}% more last 30 days</span></h2>
          </div>
          <div>
            <div class="px-2 py-2.5 rounded-lg ml-2 text-white bg-gradient-to-r from-purple-500 to-pink-500 shadow-md">
              <i class="mdi mdi-account-outline mx-1 fa-lg"></i>
            </div>

          </div>
        </div>
      </div>
      <div class="w-full md:w-1/2 lg:w-1/4 mb-5 px-3">
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
            <div class="px-2 py-2.5 rounded-lg ml-2 text-white bg-gradient-to-r from-purple-500 to-pink-500 shadow-md">
              <i class="mdi mdi-widgets inline-flex mx-1 fa-lg"></i>
            </div>

          </div>
        </div>
      </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

    @php
    if ($last_month_workshops == 0 || $last_month_users == 0 || $last_month_partipants == 0){
    $last_month = array();
    $last_month['y'] = 0;
    $last_month['month_name'] = date('M');
    $last_month['x'] = \Carbon\Carbon::now()->format('Y-m-d h:i:s');
    if($last_month_workshops == 0) array_push($workshopChart,$last_month );
    if($last_month_partipants == 0) array_push($partipantsChart,$last_month );
    if($last_month_users == 0){
    $last_month['profile_photo_url'] = '';
    array_push($usersChart,$last_month );
    }
    }
    if ($first_month_workshops == 0 || $first_month_users == 0 || $first_month_partipants == 0){
    $first_month = array();
    $first_month['y'] = 0;
    $first_month['month_name'] = "Jan";
    $first_month['x'] = "2022-01-01 01:14:19";
    if($first_month_workshops == 0) array_unshift($workshopChart,$first_month );
    if($first_month_partipants == 0) array_unshift($partipantsChart,$first_month );
    if($first_month_users == 0){
    $first_month['profile_photo_url'] = '';
    array_unshift($usersChart,$first_month );
    }
    }
    @endphp
    <div class="flex flex-wrap">
      <div class="w-full md:w-1/2 container mt-10 px-3">
        <div class="w-full bg-white rounded-lg shadow">
          <canvas class = "inline-block" id="workshopChart"></canvas>
        </div>
      </div>
      <div class="w-full md:w-1/2 container mt-10 px-3">
        <div class="w-full bg-white rounded-lg shadow">
          <canvas id="usersChart"></canvas>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    <?php $js_array = json_encode($workshopChart); echo "var newWorkshops_array = ". $js_array . ";\n"; ?>
<?php $js_array = json_encode($partipantsChart); echo "var newParticipants_array = ". $js_array . ";\n";?>
    var workshopChart = document.getElementById("workshopChart").getContext("2d");
    var gradientStroke1 = workshopChart.createLinearGradient(0, 230, 0, 50);
    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors
    var gradientStroke2 = workshopChart.createLinearGradient(0, 230, 0, 50);
    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors
    workshopChart.canvas.parentNode.style.height = "300px";
var myChart = new Chart(workshopChart, {
  type: 'line',
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      xAxes: [{
        gridLines: {
                display:false
        },
        type: 'time',
        time: {
            unit: 'month',
            displayFormats: {
              month: 'MMM'
            }
      },
      
      }],
      yAxes: [{
       
                display: true,
                ticks: {
                    beginAtZero: true,
                    stepSize: 1
                }
            }]
    },
  },
  data: {
    labels: getPreviousMonths(),
    datasets: [{
      label: 'New workshops by month',
      data: newWorkshops_array,
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#cb0c9f",
      borderWidth: 3,
      backgroundColor: gradientStroke1,
      fill: true,
      borderWidth: 1
    },
    {
      label: 'New participants by month',
      data: newParticipants_array,
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#3A416F",
      borderWidth: 3,
      backgroundColor: gradientStroke2,
      fill: true,
      borderWidth: 1
    }
  ]
  }
});
<?php $js_array = json_encode($usersChart); echo "var newUsers_array = ". $js_array . ";\n";?>
var usersChart = document.getElementById("usersChart").getContext("2d");
var gradientStroke1 = usersChart.createLinearGradient(0, 230, 0, 50);
gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors
usersChart.canvas.parentNode.style.height = "300px";
var myChart = new Chart(usersChart, {
  type: 'line',
  beginAtZero: true,
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      xAxes: [{
        gridLines: {
                display:false
            },
        type: 'time',
        time: {
            unit: 'month',
            displayFormats: {
              month: 'MMM'
            },     
      }
      }],
      yAxes: [{
                ticks: {
                  beginAtZero: true,
                  stepSize: 1
                }, 
            }]
    },
  },
  data: {
    labels: getPreviousMonths(),
    datasets: [{
      label: 'New users by month',
      data: newUsers_array,
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#cb0c9f",
      borderWidth: 3,
      backgroundColor: gradientStroke1,
      fill: true,
      borderWidth: 1
    }]
  }
});
function getPreviousMonths() {
  var months = [];
  const d = new Date();
  months = Array.apply(0, Array(d.getMonth()+1)).map(function(_,i){return moment().month(i).toISOString()})
  return months;
}
  </script>
</div>
</div>

@endsection