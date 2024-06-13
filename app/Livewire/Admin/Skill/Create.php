<?php

namespace App\Livewire\Admin\Skill;

use App\Livewire\Forms\Admin\Skill\StoreForm;
use App\Models\Skill;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Create extends Component
{
    public StoreForm $form;

    #[Layout('layouts.admin.main')]
    public function render(): View
    {
        return view('livewire.admin.skill.create');
    }

    public function store(): void
    {
        $data = $this->form->validate();
        
        Skill::create($data);

        $this->redirect(route('admin.skills.index'));
    }
}
