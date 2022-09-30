<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;
use App\Models\Landing;

class Section3Component extends Component
{


    public $heading;
    public $paragraf_1;
    public $button;


    public function render()
    {

        $section3 = Landing::where('section_id','section3')->first();
        $this->heading = $section3->heading;
        $this->paragraf_1 = $section3->paragraf_1;
        $this->button = $section3->button;


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
          $landing = Landing::find($id);
          $landing->update($validated);
          $this->dispatchBrowserEvent('contentChanged');
    }
}
