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
        $this->section8 = Landing::where('section_id','section8')->first();
        $this->heading = $this->section8->heading;
        $this->paragraf_1 = $this->section8->paragraf_1;
        $this->button = $this->section8->button;
        
    }

    public function render()
    {
        return view('livewire.landing.section8-component',
        ['section8'=>$this->section8]);
    }

    public function update()
    {
        $validated = $this->validate([
            'heading' => 'required',
            'paragraf_1' => 'required',
            'button' => 'required',
          ]);

          if($this->img_1 != null){

            $file_name =  $this->img_1->store('section8img','public');

            $validated['img_1'] = $file_name;

            $oldsection8img = $this->section8->img_1;
        }
        if($this->img_2 != null){

            $file_name =  $this->img_2->store('section8img','public');

            $validated['img_2'] = $file_name;

            $oldsection8img2 = $this->section8->img_2;
        }

            $this->section8->update($validated);

            // delete old img only when db update is succesful
            if($this->img_1 != null){
                Storage::delete('/public/' .$oldsection8img);
            }
            if($this->img_2 != null){
                Storage::delete('/public/' .$oldsection8img2);
            }
          

          $this->dispatchBrowserEvent('section8Update');
    }
}
