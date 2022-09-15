<?php

namespace App\Http\Livewire;

use App\Models\Workshop;
use Asantibanez\LivewireCalendar\LivewireCalendar;
use Illuminate\Support\Collection;

class AppointmentsCalendar extends LivewireCalendar
{

    public function events() : Collection{
        return Workshop::whereNotNull('time')
           ->get()
           ->map(function ($workshop) {

            return [
                'id'=> $workshop->id,
                'title'=> $workshop->name,
                'description' => $workshop->user->name,
                'date' => $workshop->time,
            ];
        });
    }

    public function onEventDropped($eventId, $year, $month, $day){

        Workshop::where('id', $eventId)
            ->update(['time' => $year . '-' . $month . '-' . $day]);
    }
  
}
