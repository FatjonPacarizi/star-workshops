<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Workshop;
use Livewire\WithPagination;

class ShowPastsWorkshopsPage extends Component
{
    use WithPagination;

    public function render()
    {
        $currentTime = Carbon::now('Europe/Tirane');

        $pasts = Workshop::where('workshops.time','<',$currentTime)
        ->orderBy('id', 'DESC')
        ->simplePaginate(6,['*'], 'pastsWorkshopsPage');
        
        return view('livewire.show-pasts-workshops-page',['pasts'=>$pasts]);
    }
}
