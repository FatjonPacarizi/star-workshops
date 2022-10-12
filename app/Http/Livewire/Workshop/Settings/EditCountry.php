<?php

namespace App\Http\Livewire\Workshop\Settings;

use App\Models\Country;
use Livewire\Component;

class EditCountry extends Component
{
    public $name;
    public $region;
    public $language;
    public $country;
    protected $listeners = ['$refresh'];


    public function render()
    {
        return view('livewire.workshop.settings.edit-country',['countries'=>Country::all()]);
    }
    public function show($id){
        $this->country = Country::find($id);
        $this->name = $this->country->name;
        $this->region = $this->country->region;
        $this->language = $this->country->language;

    }
    public function update(){
        $validatedData = $this->validate([
            'name' => 'required',
            'region' => 'required',
            'language' => 'required',
        ]);

        $this->country->update($validatedData);

        $this->emitTo('livewire.workshop.workshop-settings', '$refresh');
    }
    public function deleteCountry($id){
        Country::where('id',$id)->delete();
        $this->dispatchBrowserEvent('countryEvent');
    }
}
