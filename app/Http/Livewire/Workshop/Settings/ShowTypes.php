<?php

namespace App\Http\Livewire\Workshop\Settings;

use App\Models\Type;
use Livewire\Component;

class ShowTypes extends Component
{
    public $type;
    public $name;
    protected $listeners = ['$refresh'];

    public function render()
    {
        return view('livewire.workshop.settings.show-types',['types'=>Type::all()]);
    }
    public function show($id){
        $this->type = Type::find($id);
        $this->name = $this->type->name;
    }
    public function deleteType($id){
        Type::where('id',$id)->delete();
    }
    public function updateType(){
        $validatedData = $this->validate([
            'name' => 'required',
        ]);
        $this->type->update($validatedData);
        $this->dispatchBrowserEvent('typeUpdated');
    }
}
