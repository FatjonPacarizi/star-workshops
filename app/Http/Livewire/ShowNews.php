<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\NewsPage;


class ShowNews extends Component
{
    use WithPagination;
    protected $listeners = ['reloadNews'];
    public $search;
    public $perpage;
    public $sortby;

    public function render()
    {
        $page = 8;
        if($this->perpage != null) $page =  $this->perpage;

        $sort = "DESC";
        if($this->sortby != null) $sort =  $this->sortby;



        return view('livewire.show-news',['news'=>NewsPage::where('title','like','%'.$this->search.'%')->where(['author'=>Auth::id()])->orderBy('id',$sort)->paginate($page)]);
    }
     public function reloadNews($search,$perpage,$sortby){
       
        $this->search = $search;
        $this->perpage = $perpage;
        $this->sortby = $sortby;
     }
}
