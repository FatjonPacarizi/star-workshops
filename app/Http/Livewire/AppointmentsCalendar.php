<?php

namespace App\Http\Livewire;

use App\Models\Workshop;
use Asantibanez\LivewireCalendar\LivewireCalendar;
use Illuminate\Support\Collection;

class AppointmentsCalendar extends LivewireCalendar
{
    public function events() : Collection{

        $this->gridStartsAt->shiftTimezone(config('app.timezone'));
        $this->gridEndsAt->shiftTimezone(config('app.timezone'));

        return Workshop::whereNotNull('time')
           ->get()
           ->map(function ($workshop) {
            
            return [
                'id'  => $workshop->id,
                'title'=> $workshop->name ,
                'description' => ucfirst($workshop->user->name). ': '
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
