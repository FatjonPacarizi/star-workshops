<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;
use App\Models\Landing;

class Section7Component extends Component
{
    public $heading;
    public $paragraf_1;
    public $button;
    public $section7;


    public function mount(){
        $this->section7 = Landing::where('section_id','section7')->first();
        $this->heading = $this->section7->heading;
        $this->paragraf_1 = $this->section7->paragraf_1;
        $this->button = $this->section7->button;
        
    }
    public function render()
    {
        return view('livewire.landing.section7-component',
        ['section7'=>$this->section7]);
    }

    public function update()
    {
        //dd($formData);
        $validated = $this->validate([
            'heading' => 'required',
            'paragraf_1' => 'required',
            'button' => 'required',
          ]);
          
          
          $this->section7->update($validated);

          $this->dispatchBrowserEvent('section7Update');
    }
}
