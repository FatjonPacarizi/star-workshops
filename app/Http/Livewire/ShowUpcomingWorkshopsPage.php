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
        $upcomings = Workshop::whereNull('workshop_endTime')
        ->orderBy('workshop_startTime', 'DESC')
        ->simplePaginate(6,['*'], 'upcomingWorkshopsPage');

        return view('livewire.show-upcoming-workshops-page',['upcomings'=>$upcomings]);
    }
}
