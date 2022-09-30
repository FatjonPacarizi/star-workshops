<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;
use App\Models\Landing;

class Section8Component extends Component
{
    public $heading;
    public $paragraf_1;
    public $button;

    public function render()
    {
        $section8 = Landing::where('section_id','section8')->first();
        $this->heading = $section8->heading;
        $this->paragraf_1 = $section8->paragraf_1;
        $this->button = $section8->button;

        return view('livewire.landing.section8-component',
        ['section8'=>Landing::where('section_id','section8')->first()]);
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
