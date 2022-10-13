<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Streaming;

class ShowStreaming extends Component
{
    use WithPagination;
    protected $listeners = ['reloadStreaming'];
    public $search;
    public $perpage;
    public $sortby;
    public $workshop;

    public function render()
    {
        $page = 8;
        if($this->perpage != null) $page =  $this->perpage;

        $sort = "ASC";
        if($this->sortby != null) $sort =  $this->sortby;

        return view('livewire.show-streaming',['streaming'=>Streaming::where('workshop_id',$this->workshop->id)->where('title','like','%'.$this->search.'%')->orderBy('id',$sort)->paginate($page)]);
    }
   
    public function reloadStreaming($search,$perpage,$sortby){

        $this->search = $search;
        $this->perpage = $perpage;
        $this->sortby = $sortby;
     }
}
