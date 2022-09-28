<?php

namespace App\Http\Livewire;

use App\Models\Workshop;
use Asantibanez\LivewireCalendar\LivewireCalendar;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class AppointmentsCalendar extends LivewireCalendar
{

    public function events() : Collection{

        return Workshop::whereNotNull('time')
           ->get()
           ->map(function ($workshop) {
            if($workshop->author == Auth::check())
            return [
                'id'  => $workshop->id,
                'title'=> $workshop->name ,
                'description' => $workshop->user->name. ' '
                    .$workshop->category->name,
                'date' => $workshop->time,
                ];
        });
    }

    public function onEventClick($eventId){

        $workshops = Workshop::findOrFail($eventId);

        return redirect()->route('single-workshop',$workshops);
    }

    public function onEventDropped($eventId, $year, $month, $day){

        Workshop::where('id', $eventId)
            ->update(['time' => $year . '-' . $month . '-' . $day]);
    }

    public function onDayClick($year, $month, $day){


    }

}
