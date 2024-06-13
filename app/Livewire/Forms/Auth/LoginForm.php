<?php

namespace App\Livewire\Forms\Auth;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate('required|email', onUpdate: false)]
    public $email = '';

    #[Validate('required|string|min:8', onUpdate: false)]
    public $password = '';
}
