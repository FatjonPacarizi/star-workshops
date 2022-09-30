<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;
use App\Models\Landing;

class Section7Component extends Component
{
    public $heading;
    public $paragraf_1;
    public $button;

    public function render()
    {
        $section7 = Landing::where('section_id','section7')->first();
        $this->heading = $section7->heading;
        $this->paragraf_1 = $section7->paragraf_1;
        $this->button = $section7->button;

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
    }
}
