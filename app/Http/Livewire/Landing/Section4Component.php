<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;
use App\Models\Landing;

class Section4Component extends Component
{

    public $heading;
    public $paragraf_1;
    public $button;

    public function render()
    {
        $section4 = Landing::where('section_id','section4')->first();
        $this->heading = $section4->heading;
        $this->paragraf_1 = $section4->paragraf_1;
        $this->button = $section4->button;
        
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
          $landing = Landing::find($id);
          $landing->update($validated);
    }
}
