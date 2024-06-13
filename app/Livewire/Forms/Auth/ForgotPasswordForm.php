<?php

namespace App\Livewire\Forms\Auth;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ForgotPasswordForm extends Form
{
    #[Validate('required|email', onUpdate: false)]
    public $email = '';  
}
