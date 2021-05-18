<?php

namespace App\Http\Livewire\Pages;

use App\Models\Book;
use App\Models\Quote;
use Exception;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

class BookDetails extends Component
{
    protected $listeners = ['quoteDeleted' => '$refresh'];

    public Book $book;
    public $quote = '';
    public $addingQuote = false;

    /**
     * Delete the Book
     *
     * @return RedirectResponse
     */
    public function deleteBook()
    {
        auth()->user()->books()->detach($this->book->id);
        auth()->user()->quotes()->where('book_id', $this->book->id)->delete();
        if(!$this->book->quotes()->count()) {
            $this->book->delete();
        }
        return redirect()->route('home');
    }

    /**
     * Add a new quote for this user/book set
     */
    public function storeQuote()
    {
        try {
            Quote::create([
                'quote' => $this->quote,
                'user_id' => auth()->user()->id,
                'book_id' => $this->book->id
            ]);
            $this->addingQuote = false;
            $this->quote = '';
        } catch (Exception $e) {
            logger()->error('Could not add quote: '. $e->getMessage());
            $this->addingQuote = false;
            flash('Quote could not be added :-(')->error();
        }
    }

    public function render()
    {
        return view('livewire.pages.book-details', [
            'quotes' => $this->book->quotes()->orderBy('created_at', 'desc')->get()
        ]);
    }
}
