<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Faq;


class ShowFaq extends Component
{
    use WithPagination;
    protected $listeners = ['reloadFaq'];
    public $search;
    public $perpage;
    public $sortby;

    public function render()
    {
        $page = 8;
        if($this->perpage != null) $page =  $this->perpage;

        $sort = "ASC";
        if($this->sortby != null) $sort =  $this->sortby;       
        return view('livewire.show-faq',['faq'=>Faq::where('question','like','%'.$this->search.'%')->orWhere('answer','like','%'.$this->search.'%')->orderBy('status',$sort)->paginate($page)]);
    }
     public function reloadFaq($search,$perpage,$sortby){

        $this->search = $search;
        $this->perpage = $perpage;
        $this->sortby = $sortby;
     }
}
    