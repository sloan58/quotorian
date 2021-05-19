<?php

namespace App\Http\Livewire\Components;

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
            $book = Book::firstOrCreate(['book_id' => $this->googleBook['id']],
                [
                    'title' => $this->googleBook['volumeInfo']['title'],
                    'author' => implode(',', $this->googleBook['volumeInfo']['authors']) ?? 'Unknown',
                    'publishedDate' => $this->googleBook['volumeInfo']['publishedDate'],
                    'description' => $this->googleBook['volumeInfo']['description'],
                    'pageCount' => $this->googleBook['volumeInfo']['pageCount'],
                    'thumbnail' => str_replace('http:', 'https:', $this->googleBook['volumeInfo']['imageLinks']['thumbnail'])
                ]
            );
            $book->users()->attach(auth()->user()->id);
            return redirect()->route('book.edit', $book);
        } catch(\Exception $e) {
            logger()->error($e->getMessage(), $this->googleBook);
            $this->emit('bookAdded', $e->getMessage(), 'error');
        }
    }

    public function render()
    {
        return view('livewire.components.google-books-result');
    }
}
