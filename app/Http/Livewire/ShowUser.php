<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\User;

class ShowUser extends Component
{
    use WithPagination;
    public $search;
    protected $listeners = ['reloadUser'];
    public $perpage;
    public $sortby;

    public function render()
    {
        $page = 8;
        if($this->perpage != null) $page =  $this->perpage;

        $sort = "ASC";
        if($this->sortby != null) $sort =  $this->sortby;

        return view('livewire.show-user',['users'=>User::where('name','like','%'.$this->search.'%')->orwhere('email','like','%'.$this->search.'%')->orderBy('id',$sort)->paginate($page)]);
    }

    public function reloadUser($search,$perpage,$sortby){
        $this->search = $search;
        $this->perpage = $perpage;
        $this->sortby = $sortby;
    }
}
