<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class NewDroidRegistration extends Component
{
    use WithFileUploads;
    // public $userId;
    public $name;
    public $description;
    public $display_image;
    public $version;
    protected $rules = [
        'name' => 'required|max:20',
        'description' => 'required|max:255',
        'display_image' => 'required|image',
        'version' => 'nullable',
    ];

    public function updated($mainframeDroid) {
        $this->validateOnly($mainframeDroid);
    }
    public function storeDroid() {
        $validateData = $this->validate();

        dd($validateData);
    }
    public function render()
    {
        return view('livewire.new-droid-registration');
    }
}