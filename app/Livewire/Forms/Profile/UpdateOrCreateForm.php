<?php

namespace App\Livewire\Forms\Profile;

use Livewire\Attributes\Validate;
use Livewire\Form;

class UpdateOrCreateForm extends Form
{
    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10')]
    public $phonenumber = '';

    #[Validate('required|string|max:255')]
    public $expirience = 'Нет';

    #[Validate('nullable|string|max:255')]
    public $portfolio = '';

    #[Validate('nullable|image')]
    public $avatar = null;

    public $skills;

    public $professions;
}
