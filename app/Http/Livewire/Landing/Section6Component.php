<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;
use App\Models\Landing;

class Section6Component extends Component
{

    public $heading;
    public $paragraf_1;
    public $paragraf_2;
    public $section6;

    public function mount(){
        $this->section6 = Landing::where('section_id','section6')->first();
        $this->heading = $this->section6->heading;
        $this->paragraf_1 = $this->section6->paragraf_1;
        $this->paragraf_2 = $this->section6->paragraf_2;
        
    }
    public function render()
    {
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
        
          $this->section6->update($validated);

          $this->dispatchBrowserEvent('section6Update');
    }
}
