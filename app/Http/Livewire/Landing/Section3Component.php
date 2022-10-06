<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;
use App\Models\Landing;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Section3Component extends Component
{

    use WithFileUploads;
    public $heading;
    public $paragraf_1;
    public $button;
    public $img_1;
    public $section3;


    public function mount(){
        $this->section3 = Landing::where('section_id','section3')->first();
        $this->heading = $this->section3->heading;
        $this->paragraf_1 = $this->section3->paragraf_1;
        $this->button = $this->section3->button;
        
    }

    public function render()
    {
        return view('livewire.landing.section3-component',
        ['section3'=>Landing::where('section_id','section3')->first()]);
    }

    public function update($id)
    {
        $validated = $this->validate([
            'heading' => 'required',
            'paragraf_1' => 'required',
            'button' => 'required',
          ]);
         
          if($this->img_1 != null){

            $file_name =  $this->img_1->store('section3img','public');

            $validated['img_1'] = $file_name;

            $oldsection3img = $this->section3->img_1;
        }

            $this->section3->update($validated);

            // delete old img only when db update is succesful
            if($this->img_1 != null){
                Storage::delete('/public/' .$oldsection3img);
            }

          $this->dispatchBrowserEvent('section3Update');


    }
}
