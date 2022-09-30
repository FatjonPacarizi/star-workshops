<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;
use App\Models\Landing;

class Section1Component extends Component
{
    public $heading;
    public $paragraf_1;
    public $button;


    public function render()
    {
        $section1 = Landing::where('section_id','section1')->first();
        $this->heading = $section1->heading;
        $this->paragraf_1 = $section1->paragraf_1;
        $this->button = $section1->button;
        
        
        return view('livewire.landing.section1-component',
        ['section1'=>Landing::where('section_id','section1')->first()]);
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
    }
}
