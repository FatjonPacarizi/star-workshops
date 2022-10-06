<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;
use App\Models\Landing;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Section4Component extends Component
{
    use WithFileUploads;
    public $heading;
    public $paragraf_1;
    public $button;
    public $img_1;
    public $section4;

    public function mount(){
        $this->section4 = Landing::where('section_id','section4')->first();
        $this->heading = $this->section4->heading;
        $this->paragraf_1 = $this->section4->paragraf_1;
        $this->button = $this->section4->button;
        
    }

    public function render()
    {
        return view('livewire.landing.section4-component',
        ['section4'=>Landing::where('section_id','section4')->first()]);
    }

    public function update($id)
    {
        $validated = $this->validate([
            'heading' => 'required',
            'paragraf_1' => 'required',
            'button' => 'required',
          ]);
          
          if($this->img_1 != null){

            $file_name =  $this->img_1->store('section4img','public');

            $validated['img_1'] = $file_name;

            $oldsection4img = $this->section4->img_1;
        }

            $this->section4->update($validated);

            // delete old img only when db update is succesful
            if($this->img_1 != null){
                Storage::delete('/public/' .$oldsection4img);
            }

          $this->dispatchBrowserEvent('section4Update');
    }
}
