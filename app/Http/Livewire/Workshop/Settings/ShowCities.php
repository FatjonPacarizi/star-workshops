<?php

namespace App\Http\Livewire\Workshop\Settings;

use App\Models\City;
use App\Models\Country;
use Livewire\Component;

class ShowCities extends Component
{
    public $name;
    public $country_id;
    public $postalcode;
    public $city;
    protected $listeners = ['$refresh'];


    public function render()
    {
        return view('livewire.workshop.settings.show-cities',[
            'countries'=>Country::all(),
            'cities'=>City::all(),
        ]);
    }
    public function show($id){
        $this->city = City::find($id);
        $this->name = $this->city->name;
        $this->country_id = $this->city->country_id;
        $this->postalcode = $this->city->postalcode;

    }
    public function update(){
        $validatedData = $this->validate([
            'name' => 'required',
            'country_id' => 'required',
            'postalcode' => 'required',
        ]);

        $this->city->update($validatedData);
        $this->dispatchBrowserEvent('cityUpdated');
    }
    public function deleteCity($id){
        City::where('id',$id)->delete();
    }
}
