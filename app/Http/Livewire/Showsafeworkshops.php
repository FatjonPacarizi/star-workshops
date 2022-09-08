<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Workshop;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class Showsafeworkshops extends Component
{
    use WithPagination;
    protected $listeners = ['reloadSafeworkshops'];
    public $search;
    public $perpage;
    public $sortby;

    public function render(){

        $page = 8;
        if($this->perpage != null) $page =  $this->perpage;

        $sort = "ASC";
        if($this->sortby != null) $sort =  $this->sortby;

        $workshops1 = Workshop::where('name', 'like', '%'.$this->search.'%')
        ->onlyTrashed()
        ->orderBy('deleted_at',$sort)
        ->paginate($page,['*'], 'deletedWorkshopsPage');

        return view('livewire.showsafeworkshops',['workshops1'=> $workshops1]);
    }

    
    public function reloadSafeworkshops($search,$perpage,$sortby){

        $this->search = $search;
        $this->perpage = $perpage;
        $this->sortby = $sortby;
    }
}
