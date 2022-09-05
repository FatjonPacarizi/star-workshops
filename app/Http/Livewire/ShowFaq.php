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
    

        $faq = Faq::where('question','like','%'.$this->search.'%')
        ->orderBy('id',$sort)
        ->paginate($page);

        return view('livewire.show-faq',['faq'=>$faq]);
    }

    public function reloadFaq($search,$perpage,$sortby){

        $this->search = $search;
        $this->prepage = $perpage;
        $this->sortby = $sortby;
    }
}
