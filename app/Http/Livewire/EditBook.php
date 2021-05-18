<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Quote;
use Livewire\Component;

class EditBook extends Component
{
    public Book $book;
    public $quote = '';
    public $addingQuote = false;

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
        } catch (\Exception $e) {
            logger()->error('Could not add quote: '. $e->getMessage());
            $this->addingQuote = false;
            flash('Quote could not be added :-(')->error();
        }
    }

    public function render()
    {
        info('quotes', [ $this->book->quotes]);
        return view('livewire.edit-book', [
            'quotes' => $this->book->quotes()->orderBy('created_at', 'desc')->get()
        ]);
    }
}
