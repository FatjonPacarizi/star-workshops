<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Workshop;

class DashboardController extends Controller
{
    public function index(){


        // $data = Workshop::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created_at) as month_name"),\DB::raw('max(created_at) as createdAt'))
         
        // ->whereYear('created_at', date('Y'))
        // ->groupBy('month_name') 
        // ->orderBy('createdAt')
        // ->get();

        $data = Workshop::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created_at) as month_name"),\DB::raw('max(created_at) as createdAt'))
         
        ->whereYear('created_at', date('Y'))
        ->groupBy('month_name') 
        ->orderBy('createdAt')
        ->get();
        
       

        return view('dashboard', ['users'=>User::select('id')->count(),
                                   'usersThisMonthRegistered'=>User::where('created_at','>',Carbon::now()->subDays(30))->count(),
                                   'totalWorkshops'=>Workshop::select('id')->count(),
                                   'workshopsThisMonthRegistered'=>Workshop::where('created_at','>',Carbon::now()->subDays(30))->count(),
                                    'lineChart'=>$data]);
    }
}
