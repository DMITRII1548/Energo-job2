<?php

namespace App\Livewire\Forms\Auth;

use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ResetPasswordForm extends Form
{
    #[Url(as: 'email')]
    #[Validate('required|email', onUpdate: false)]
    public $email = '';

    #[Validate('required|min:8|confirmed', onUpdate: false)]
    public $password = '';

    #[Validate('required', onUpdate: false)]
    public $password_confirmation = '';
}
