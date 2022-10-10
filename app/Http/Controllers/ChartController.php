<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Workshop;

use DB;

class ChartController extends Controller
{
    public function index()
    {
         $data['lineChart'] = Workshop::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created_at) as month_name"),\DB::raw('max(created_at) as createdAt'))
         
        ->whereYear('created_at', date('Y'))
        ->groupBy('month_name') 
        ->orderBy('createdAt')
        ->get();
        
 
        return view('/dashboard', $data);
    }
}
