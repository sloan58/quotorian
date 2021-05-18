<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class Bookshelf extends Component
{
    public $term = '';
    public $paginate = 100;

    public function render()
    {
        $books = $this->buildSearchHits();
        return view('livewire.pages.bookshelf', [
            'books' => $books
        ]);
    }

    /**
     * Build the Books search results
     *
     * @return LengthAwarePaginator|Builder|mixed
     */
    private function buildSearchHits()
    {
        $books = auth()->user()->books()->with('quotes')->when($this->term, function ($query) {
            $query->where('title', 'like', '%' . $this->term . '%');
            $query->orWhere('author', 'like', '%' . $this->term . '%');
            $query->orWhereHas('quotes', function($query) {
                $query->where('quote', 'like', '%' . $this->term . '%');
            });
        });

        return $books->orderBy('created_at', 'desc')
            ->paginate($this->paginate);
    }
}
