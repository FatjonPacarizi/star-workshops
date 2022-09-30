<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;
use App\Models\Landing;

class Section6Component extends Component
{

    public $heading;
    public $paragraf_1;
    public $paragraf_2;

    public function render()
    {
        $section6 = Landing::where('section_id','section6')->first();
        $this->heading = $section6->heading;
        $this->paragraf_1 = $section6->paragraf_1;
        $this->paragraf_2 = $section6->paragraf_2;

        return view('livewire.landing.section6-component',
        ['section6'=>Landing::where('section_id','section6')->first()]);
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
