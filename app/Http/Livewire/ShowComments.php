<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Comment;

class ShowComments extends Component
{
    
    use WithPagination;

    public function render()
    {
        return view('livewire.show-comments',['comments'=>Comment::latest('created_at')->simplePaginate(3)]);
    }
}
