<?php

namespace App\Http\Livewire\Components;

use App\Models\Quote;
use Livewire\Component;

class QuoteCard extends Component
{
    public Quote $quote;
    public $isEditing = false;
    public $newQuote;
    public $newPageNumber;
    public $favorited;

    public function updateQuote()
    {
        if(!empty($this->newQuote)) {
            $this->quote->update([
                'quote' => $this->newQuote,
                'page_number' => $this->newPageNumber
            ]);
        }
        
        $this->isEditing = false;
        $this->initFormData();
    }
    /**
     * Delete the quote
     */
    public function deleteQuote()
    {
        $this->quote->delete();
        $this->emit('quoteDeleted');
    }

    /**
     * Update the favorite property on the quote
     */
    public function updatedFavorited()
    {
        $this->quote->update([
            'favorite' => $this->favorited
        ]);
    }

    /**
     * The component has mounted
     */
    public function mount()
    {
        $this->initFormData();
        $this->favorited = $this->quote->favorite;
    }

    public function render()
    {
        return view('livewire.components.quote-card');
    }

    /**
     * Set the default values for the new quote and page number
     */
    private function initFormData() {
        $this->newQuote = $this->quote->quote;
        $this->newPageNumber = $this->quote->page_number;
    }
}
