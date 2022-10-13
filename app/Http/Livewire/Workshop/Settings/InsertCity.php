<?php

namespace App\Http\Livewire\Workshop\Settings;

use App\Models\City;
use App\Models\Country;
use Livewire\Component;

class InsertCity extends Component
{
    public $name;
    public $country_id;
    public $postalcode;

    public function render()
    {
        return view('livewire.workshop.settings.insert-city',[
            'countries'=>Country::all(),
        ]);
    }
    public function insertCity(){
        $validatedData = $this->validate([
            'name' => 'required',
            'country_id' => 'required',
            'postalcode' => 'required',
        ]);

        City::insert($validatedData);

        $this->dispatchBrowserEvent('cityInserted');

        $this->emitTo('workshop.settings.show-cities', '$refresh');
    }
}
