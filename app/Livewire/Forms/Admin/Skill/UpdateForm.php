<?php

namespace App\Livewire\Forms\Admin\Skill;

use Livewire\Attributes\Validate;
use Livewire\Form;

class UpdateForm extends Form
{
    #[Validate('required|string|max:255|min:1')]
    public $title;
}
