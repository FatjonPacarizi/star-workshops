<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Workshop;
use App\Models\workshops_users;

class DashboardController extends Controller
{
    public function index(){

        $workshopChart = Workshop::select(\DB::raw("COUNT(*) as y"), \DB::raw("MONTHNAME(created_at) as month_name"),\DB::raw('max(created_at) as x'))
        ->whereYear('created_at', date('Y'))
        ->groupBy('month_name') 
        ->orderBy('x')
        ->get()->toArray();
        $first_month_workshops = Workshop::select('id')->whereMonth('created_at',1)->get();
        $last_month_workshops = Workshop::select('id')->whereMonth('created_at',Carbon::now()->month)->get();
       
        $usersChart = User::select(DB::raw("COUNT(*) as y"), \DB::raw("MONTHNAME(created_at) as month_name"),\DB::raw('max(created_at) as x'))
        ->whereYear('created_at', date('Y'))
        ->groupBy('month_name') 
        ->orderBy('x')
        ->get()->toArray();
        $first_month_users = User::select('id')->whereMonth('created_at',1)->get();
        $last_month_users = User::select('id')->whereMonth('created_at',Carbon::now()->month)->get();


        $partipantsChart = workshops_users::select(DB::raw("COUNT(*) as y"), \DB::raw("MONTHNAME(created_at) as month_name"),\DB::raw('max(created_at) as x'))
        ->whereYear('created_at', date('Y'))
        ->groupBy('month_name') 
        ->orderBy('x')
        ->get()->toArray();
        $first_month_partipants = workshops_users::select('id')->whereMonth('created_at',1)->get();
        $last_month_partipants = workshops_users::select('id')->whereMonth('created_at',Carbon::now()->month)->get();

       //  dd($first_month_workshops);

        
       

        return view('dashboard', ['users'=>User::select('id')->count(),
                                   'usersThisMonthRegistered'=>User::where('created_at','>',Carbon::now()->subDays(30))->count(),
                                   'totalWorkshops'=>Workshop::select('id')->count(),
                                   'workshopsThisMonthRegistered'=>Workshop::where('created_at','>',Carbon::now()->subDays(30))->count(),
                                   'workshopChart'=>$workshopChart,
                                   'first_month_workshops'=>count($first_month_workshops),
                                   'last_month_workshops'=>count($last_month_workshops),
                                   'usersChart'=>$usersChart,
                                   'first_month_users'=>count($first_month_users),
                                   'last_month_users'=>count($last_month_users),
                                   'partipantsChart'=>$partipantsChart,
                                   'first_month_partipants'=>count($first_month_partipants),
                                   'last_month_partipants'=>count($last_month_partipants)]);
    }
}
