<?php

namespace App\Http\Livewire\Workshop\Settings;

use Livewire\Component;
use App\Models\Category;

class InsertCategories extends Component
{
    public $name;
    public function render()
    {
        return view('livewire.workshop.settings.insert-categories');
    }
    public function insertCategory(){
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        Category::create($validatedData);
        $this->dispatchBrowserEvent('categoryInserted');
        $this->emitTo('workshop.settings.show-categories', '$refresh');
    }
}
