<?php

namespace App\Livewire\Forms\Admin\ParentProfession;

use Livewire\Attributes\Validate;
use Livewire\Form;

class StoreForm extends Form
{
    #[Validate('required|string|max:255|min:1')]
    public $title;
}
