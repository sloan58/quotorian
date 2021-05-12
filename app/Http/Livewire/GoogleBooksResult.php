<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class GoogleBooksResult extends Component
{
    public $googleBook = [];

    /**
     * Add new Google Book to the Bookshelf
     */
    public function addToBookshelf()
    {
        try {
            Book::create([
                'book_id' => $this->googleBook['id'],
                'title' => $this->googleBook['volumeInfo']['title'],
                'author' => implode(',', $this->googleBook['volumeInfo']['authors']) || 'Unknown',
                'publishedDate' => $this->googleBook['volumeInfo']['publishedDate'],
                'description' => $this->googleBook['volumeInfo']['description'],
                'pageCount' => $this->googleBook['volumeInfo']['pageCount'],
                'thumbnail' => $this->googleBook['volumeInfo']['imageLinks']['thumbnail']
            ]);
        } catch(\Exception $e) {
            info($e->getMessage(), $this->googleBook);
        }
    }

    public function render()
    {
        return view('livewire.google-books-result');
    }
}
