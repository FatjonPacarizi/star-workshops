<?php

namespace App\Http\Livewire\Workshop;

use App\Models\City;
use App\Models\Type;
use Livewire\Component;
use App\Models\Category;
use App\Models\Workshop_Page;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class WorkshopSettings extends Component
{
    use WithFileUploads;

    //workshopPage 
    public $heading;
    public $paragraf_1;
    public $paragraf_2;
    public $img;
    public $workshopPage;

    public function mount(){
        $this->workshopPage = Workshop_Page::first();
        $this->heading = $this->workshopPage->heading;
        $this->paragraf_1 = $this->workshopPage->paragraf_1;
        $this->paragraf_2 = $this->workshopPage->paragraf_2;        
    }
    ////
    
    public function render()
    {
        return view('livewire.workshop.workshop-settings',[
            'workshopPageData'=>$this->workshopPage]);
    }
    public function updateWorkshopData()
    {
        $validated = $this->validate([
            'heading' => 'required',
            'paragraf_1' => 'required',
            'paragraf_2' => 'required',
          ]);
          if($this->img != null){

            $file_name =  $this->img->store('workshopPage','public');

            $validated['img'] = $file_name;

            $oldworkshopPageimg = $this->workshopPage->img;
        }

            $this->workshopPage->update($validated);

            // delete old img only when db update is succesful
            if($this->img != null){
                Storage::delete('/public/' .$oldworkshopPageimg);
            }
          $this->dispatchBrowserEvent('section2Update');
          
    }
}
