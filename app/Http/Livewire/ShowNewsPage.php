<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\NewsPage;



class ShowNewsPage extends Component
{
    use WithPagination;
    protected $pagination = 6;

    public function render()
    {
        return view('livewire.show-news-page',['newspages'=>Newspage::orderBy('id', 'DESC')->paginate($this->pagination)]);
    }
}
