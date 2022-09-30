<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;
use App\Models\Landing;

class Section2Component extends Component
{

    public $heading;
    public $paragraf_1;
    public $paragraf_2;
    public $img_1;

    public function render()
    {
        $section2 = Landing::where('section_id','section2')->first();
        $this->heading = $section2->heading;
        $this->paragraf_1 = $section2->paragraf_1;
        $this->paragraf_2 = $section2->paragraf_2;

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
          $landing = Landing::find($id);
          $landing->update($validated);
    }
}
