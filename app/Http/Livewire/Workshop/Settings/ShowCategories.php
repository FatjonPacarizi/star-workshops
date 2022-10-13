<?php

namespace App\Http\Livewire\Workshop\Settings;

use Livewire\Component;
use App\Models\Category;

class ShowCategories extends Component
{
    public $category;
    public $name;
    protected $listeners = ['$refresh'];

    public function render()
    {
        return view('livewire.workshop.settings.show-categories',['categories'=>Category::all(),]);
    }
    public function show($id){
        $this->category = Category::find($id);
        $this->name = $this->category->name;
    }
    public function deleteCategory($id){
        Category::where('id',$id)->delete();
    }
    public function updateCategory(){
        $validatedData = $this->validate([
            'name' => 'required',
        ]);
        $this->category->update($validatedData);
        $this->dispatchBrowserEvent('categoryUpdated');

    }
}
