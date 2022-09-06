<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Workshop;
use Livewire\WithPagination;

class ShowUpcomingWorkshopsPage extends Component
{
    use WithPagination;
    public function render()
    {

        $currentTime = Carbon::now('Europe/Tirane');

        $upcomings = Workshop::Join("users", function($join){
            $join->on("workshops.author", "=", "users.id");
        })
        ->where('workshops.time','>=',$currentTime)
        ->select("users.name as author",'workshops.id',"workshops.name as name", "workshops.img_workshop as img_workshop","workshops.time as time")
        ->orderBy('id', 'DESC')
        ->paginate(6,['*'], 'upcomingWorkshopsPage');


        return view('livewire.show-upcoming-workshops-page',['upcomings'=>$upcomings]);
    }
}
