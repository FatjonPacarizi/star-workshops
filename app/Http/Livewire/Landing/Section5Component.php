<?php

namespace App\Http\Livewire\Landing;

use Livewire\Component;
use App\Models\Landing;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Section5Component extends Component
{
    use WithFileUploads;
    public $heading;
    public $paragraf_1;
    public $button;
    public $img_1;
    public $section5;


    public function mount(){
        $this->section5 = Landing::where('section_id','section5')->first();
        $this->heading = $this->section5->heading;
        $this->paragraf_1 = $this->section5->paragraf_1;
        $this->button = $this->section5->button;
        
    }

    public function render()
    {
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

          if($this->img_1 != null){

            $file_name =  $this->img_1->store('section5img','public');

            $validated['img_1'] = $file_name;

            $oldsection5img = $this->section5->img_1;
        }

            $this->section5->update($validated);

            // delete old img only when db update is succesful
            if($this->img_1 != null){
                Storage::delete('/public/' .$oldsection5img);
            }

          $this->dispatchBrowserEvent('section5Update');
    }
}
