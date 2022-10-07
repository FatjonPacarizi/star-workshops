<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;
use App\Models\Landing;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Section8Component extends Component
{
    use WithFileUploads;
    public $heading;
    public $paragraf_1;
    public $button;
    public $img_1;
    public $img_2;
    public $section8;

    public function mount(){
        $section8 = Landing::where('section_id','section8')->first();
        $this->heading = $section8->heading;
        $this->paragraf_1 = $section8->paragraf_1;
        $this->button = $section8->button;
        
    }

    public function render()
    {
        return view('livewire.landing.section8-component',
        ['section8s8'=>$this->section8]);
    }

    public function update($id)
    {
        $validated = $this->validate([
            'heading' => 'required',
            'paragraf_1' => 'required',
            'button' => 'required',
          ]);

          

          $this->dispatchBrowserEvent('section8Update');
    }

    }
