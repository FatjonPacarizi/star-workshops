<?php

namespace App\Http\Livewire\Workshop\Settings;

use App\Models\Country;
use Livewire\Component;

class InsertCountry extends Component
{
    public $name;
    public $region;
    public $language;
    public function render()
    {
        return view('livewire.workshop.settings.insert-country');
    }
    public function insert(){
        $validatedData = $this->validate([
            'name' => 'required',
            'region' => 'required',
            'language' => 'required',
        ]);

        Country::insert($validatedData);

        $this->dispatchBrowserEvent('countryInserted');

        $this->emitTo('workshop.settings.show-countries', '$refresh');
    }
}
