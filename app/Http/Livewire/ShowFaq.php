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
    public $sortbystatus;
    public $perpage;
    public $sortby;


    public function render()
    {

        $page = 8;
        if($this->perpage != null) $page =  $this->perpage;

        $sort = "ASC";
        if($this->sortby != null) $sort =  $this->sortby;

        $status = "Deactive";
        if($this->sortbystatus != null) $status = $this->sortbystatus;
       
        $faq = Faq::where('question','like','%'.$this->search.'%')->orderBy('id',$sort,'AND','status',$status)->paginate($page);

        return view('livewire.show-faq',['faq'=>$faq]);

    }

    public function reloadFaq($search,$perpage,$sortbystatus,$sortby){

        $this->search = $search;
        $this->prepage = $perpage;
        $this->sortbystatus = $sortbystatus;
        $this->sortby = $sortby;
    }
}
