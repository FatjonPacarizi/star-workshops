<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;
use App\Models\Landing;

class Section7Component extends Component
{
    public $heading;
    public $paragraf_1;
    public $button;
    public $section3;


    public function mount(){
        $this->section3 = Landing::where('section_id','section3')->first();
        $this->heading = $this->section3->heading;
        $this->paragraf_1 = $this->section3->paragraf_1;
        $this->button = $this->section3->button;
        
    }
    public function render()
    {
        return view('livewire.landing.section7-component',
        ['section7'=>Landing::where('section_id','section7')->first()]);
    }

    public function update($id)
    {
        $validated = $this->validate([
            'heading' => 'required',
            'paragraf_1' => 'required',
            'button' => 'required',
          ]);
          
          $landing = Landing::find($id);
          $landing->update($validated);

          $this->dispatchBrowserEvent('section7Update');
    }
}
