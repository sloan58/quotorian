<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class EditBook extends Component
{
    public Book $book;

    public function render()
    {
        return view('livewire.edit-book');
    }
}
