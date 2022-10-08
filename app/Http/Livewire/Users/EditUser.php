<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\Positions;
use App\Models\positions_users;

class EditUser extends Component
{
    public $name;
    public $email;
    public $description;
    public $position_id;
    public $user_status;
    public $user;


    public function mount(){
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->description = $this->user->description;
        $this->position_id = $this->user->userposition[0]->id;
        $this->user_status = $this->user->user_status;
    }


    public function render()
    {
        return view('livewire.users.edit-user',['positions' => Positions::all()]);
    }
    public function update(){

        if(auth()->user()->user_status != 'superadmin') abort(403);

        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'description' => '',
            'user_status' => 'required',
        ]);
       
        $this->user->update($validatedData);

        positions_users::where('user_id', $this->user->id)->update([
            'position_id' => $this->position_id,
        ]);

        $this->dispatchBrowserEvent('userUpdated');

    }
}
