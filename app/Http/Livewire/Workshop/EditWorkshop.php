<?php

namespace App\Http\Livewire\Workshop;

use App\Models\City;
use App\Models\Type;
use App\Models\Country;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditWorkshop extends Component
{
    use WithFileUploads;
    public $name;
    public $limited_participants;
    public $description;
    public $city_id;
    public $country_id;
    public $type_id;
    public $category_id;
    public $time;
    public $img_workshop;
    public $filedlink;
    public $workshop;


    public function mount(){
        $this->name = $this->workshop->name;
        $this->limited_participants = $this->workshop->limited_participants;
        $this->description = $this->workshop->description;
        $this->city_id = $this->workshop->city_id;
        $this->country_id = $this->workshop->country_id;
        $this->type_id = $this->workshop->type_id;
        $this->category_id = $this->workshop->category_id;
        $this->time = $this->workshop->time;
        $this->filedlink = $this->workshop->filedlink;
    }

    public function render()
    {
        return view('livewire.workshop.edit-workshop',['workshop'=>$this->workshop,
        'countries'=>Country::all(),
        'cities'=>City::all(),
        'types'=>Type::all(),
        'categories'=>Category::all()]);
    }
    public function update(){
       if($this->limited_participants == "") $this->limited_participants = null;
       $validatedData = $this->validate([
            'name' => 'required',
            'limited_participants' => 'nullable|numeric|gt:0',
            'description' => 'required',
            'city_id' => 'required',
            'country_id' => 'required',
            'type_id' => 'required',
            'category_id' => 'required',
            'time' => 'date:d-m-y h:i:ss',
            'filedlink' => '',
        ]);
       
        if($this->img_workshop != null){

            $file_name =  $this->img_workshop->store('workshopsImg','public');
        
            $validatedData['img_workshop'] = $file_name;

            $oldWorkshopImg = $this->workshop->img_workshop;
        }

        $this->workshop->update($validatedData);

        // delete old img only when db update is succesful
        if($this->img_workshop != null){
            Storage::delete('/public/' .$oldWorkshopImg);
        }
        $this->dispatchBrowserEvent('workshopUpdate');
    }
}
