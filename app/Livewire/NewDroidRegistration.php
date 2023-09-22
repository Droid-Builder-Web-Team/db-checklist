<?php

namespace App\Livewire;

use App\Models\MainframeDroid;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewDroidRegistration extends Component
{
    public \App\Livewire\Forms\NewDroidForm $newDroidForm;
    
    use WithFileUploads;

    public function storeDroid() {
        MainframeDroid::create(
            $this->newDroidForm->all(),
        );

        return $this->redirect('droid-management');
    }
    public function render()
    {
        return view('livewire.new-droid-registration');
    }
}