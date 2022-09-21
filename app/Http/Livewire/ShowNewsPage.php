<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\NewsPage;
use Livewire\WithPagination;

class ShowNewsPage extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.show-news-page',['newspages'=>Newspage::orderBy('id', 'DESC')->simplePaginate(6)]);
    }
}
