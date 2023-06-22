<?php

namespace App\Http\Livewire;

use Exception;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class QuotesApi extends Component
{
    public $quote;

    public function mount()
    {
        $this->fetchQuote();
    }

    public function fetchQuote()
    {
        try {
            $response = Http::get('https://type.fit/api/quotes');
            $data = $response->json();
            $randomIndex = rand(0, count($data) - 1);
            $this->quote = $data[$randomIndex];
        } catch (Exception $exception) {
            $this->quote = null;
            // Handle error if necessary
            $this->addError('quote', 'Error fetching quote.');
        }
    }

    public function render()
    {
        return view('livewire.quotes-api');
    }
}
