<?php

namespace App\Livewire\Forms\Admin\Profession;

use Livewire\Attributes\Validate;
use Livewire\Form;

class UpdateForm extends Form
{
    #[Validate('required|string|max:255|min:1')]
    public $title;

    #[Validate('required|int')]
    public $parent_profession_id;
}
