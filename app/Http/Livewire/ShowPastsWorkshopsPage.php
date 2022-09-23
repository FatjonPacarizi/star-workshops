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
        $pasts = Workshop::whereNotNull('workshop_endTime')
        ->orderBy('workshop_endTime', 'DESC')
        ->simplePaginate(6,['*'], 'pastsWorkshopsPage');
        
        return view('livewire.show-pasts-workshops-page',['pasts'=>$pasts]);
    }
}
