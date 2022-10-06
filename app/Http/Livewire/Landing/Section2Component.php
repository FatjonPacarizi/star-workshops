<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;
use App\Models\Landing;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Section2Component extends Component
{
    use WithFileUploads;
    public $heading;
    public $paragraf_1;
    public $paragraf_2;
    public $img_1;
    public $section2;

    public function mount(){
        $this->section2 = Landing::where('section_id','section2')->first();
        $this->heading = $this->section2->heading;
        $this->paragraf_1 = $this->section2->paragraf_1;
        $this->paragraf_2 = $this->section2->paragraf_2;
        
    }


    public function render()
    {
        return view('livewire.landing.section2-component',
        ['section2'=>Landing::where('section_id','section2')->first()]);
    }

    public function update($id)
    {
        $validated = $this->validate([
            'heading' => 'required',
            'paragraf_1' => 'required',
            'paragraf_2' => 'required',
          ]);
          if($this->img_1 != null){

            $file_name =  $this->img_1->store('section2img','public');

            $validated['img_1'] = $file_name;

            $oldsection2img = $this->section2->img_1;
        }

            $this->section2->update($validated);

            // delete old img only when db update is succesful
            if($this->img_1 != null){
                Storage::delete('/public/' .$oldsection2img);
            }
          $this->dispatchBrowserEvent('section2Update');
          
    }
}
