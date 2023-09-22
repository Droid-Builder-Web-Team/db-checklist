<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class NewDroidForm extends Form
{
    public $user_id = '1';
    #[RULE('required')]
    public $name;
    #[RULE('required')]
    public $description;

    public $display_image = 'test';
    #[RULE('required')]
    public $version;
    public function validateData()
    {
        $this->validate();
    }
}