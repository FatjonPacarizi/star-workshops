<?php

namespace App\Http\Livewire\Workshop\Settings;

use App\Models\Type;
use Livewire\Component;

class InsertTypes extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.workshop.settings.insert-types');
    }
    public function insertType(){
        $validatedData = $this->validate([
            'name' => 'required',
        ]);
        Type::create($validatedData);
        $this->dispatchBrowserEvent('typeInserted');
        $this->emitTo('workshop.settings.show-types', '$refresh');
    }
}
