<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;
use App\Models\Landing;

class Section1Component extends Component
{
    public $heading;
    public $paragraf_1;
    public $button;
    public $section1;
    
    public function mount(){
        $this->section1 = Landing::where('section_id','section1')->first();
        $this->heading = $this->section1->heading;
        $this->paragraf_1 = $this->section1->paragraf_1;
        $this->button = $this->section1->button;
        
    }

    public function render()
    {
        return view('livewire.landing.section1-component',
        ['section1'=>Landing::where('section_id','section1')->first()]);
    }

    public function update()
    {
        $validated = $this->validate([
            'heading' => 'required',
            'paragraf_1' => 'required',
            'button' => 'required',
          ]);

        //  DD($validated);

          $this->section1->update($validated);

          $this->dispatchBrowserEvent('section1Update');
    }
}