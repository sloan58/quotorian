<?php

namespace App\Http\Livewire\Pages;

use Exception;
use App\Models\Book;
use App\Models\Quote;
use Livewire\Component;
use Illuminate\Http\RedirectResponse;

class BookDetails extends Component
{
    protected $listeners = ['quoteDeleted' => '$refresh'];

    public Book $book;
    public $term;
    public $quote = '';
    public $pageNumber = '';
    public $addingQuote = false;
    public $activeTab = 'quotes';
    public $filterByFavorites = false;

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }
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
                'page_number' => $this->pageNumber,
                'user_id' => auth()->user()->id,
                'book_id' => $this->book->id
            ]);
            $this->addingQuote = false;
            $this->quote = '';
            $this->pageNumber = '';
        } catch (Exception $e) {
            logger()->error('Could not add quote: '. $e->getMessage());
            $this->addingQuote = false;
            flash('Quote could not be added :-(')->error();
        }
    }

    public function render()
    {
        $quotes = $this->book->quotes()->when($this->term, function($query) {
            $query->where('quote', 'like', '%' . $this->term . '%');
        })->when($this->filterByFavorites, function($query) {
            $query->where('favorite', true);
        })->orderBy('created_at', 'desc')->get();

        return view('livewire.pages.book-details', [
            'quotes' => $quotes
        ]);
    }
}
