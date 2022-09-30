<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;
use App\Models\Landing;

class Section5Component extends Component
{

    public $heading;
    public $paragraf_1;
    public $button;

    public function render()
    {
        $section5 = Landing::where('section_id','section5')->first();
        $this->heading = $section5->heading;
        $this->paragraf_1 = $section5->paragraf_1;
        $this->button = $section5->button;

        return view('livewire.landing.section5-component',
        ['section5'=>Landing::where('section_id','section5')->first()]);
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
