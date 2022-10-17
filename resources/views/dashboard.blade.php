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
    
        $months = array();
        $i=0;
        foreach ($lineChart as $item) {
            if (!in_array($item->createdAt, $months)){
                    $months[$i] = $item->createdAt;
            }
            $i++;
      //  echo $item;
    }
   

        @endphp
       <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
       <div class="container">
         <canvas id="examChart"></canvas>
       </div>
    </div>
    <script type="text/javascript">
     var ctx = document.getElementById("examChart").getContext("2d");

var myChart = new Chart(ctx, {
  type: 'line',
  options: {
    scales: {
      xAxes: [{
        type: 'time',
        time: {
            unit: 'month'
      }
      }]
    }
  },
  data: {
    labels: getPreviousMonths(),
    datasets: [{
      label: 'Demo',
      data: [{
          t: '2022-01-15T13:03:00Z',
          y: 1
        },
        {
          t: '2022-03-25T13:02:00Z',
          y: 14
        },
        {
          t: '2022-10-25T14:12:00Z',
          y: 10
        }
      ],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1
    }]
  }
});
function getPreviousMonths() {
  var months = [];
  months = Array.apply(0, Array(10)).map(function(_,i){return moment().month(i).toISOString()})
  return months;
}
    </script>
</div>
</div>

@endsection