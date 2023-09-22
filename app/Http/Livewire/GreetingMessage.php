<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GreetingMessage extends Component
{
    public $greeting;

    public function mount()
    {
        $currentTime = now();
        $hour = $currentTime->hour;

        if ($hour >= 5 && $hour < 12) {
            $this->greeting = 'Good Morning';
        } elseif ($hour >= 12 && $hour < 18) {
            $this->greeting = 'Good Afternoon';
        } else {
            $this->greeting = 'Good Evening';
        }

        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.greeting-message', [
            'user' => $this->user,
        ]);
    }
}