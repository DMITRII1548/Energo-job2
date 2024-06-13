<?php

namespace App\Livewire\Admin\Skill;

use App\Livewire\Forms\Admin\Skill\UpdateForm;
use App\Models\Skill;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Edit extends Component
{
    public Skill $skill;

    public UpdateForm $form;

    public function mount(): void
    {
        $this->form->title = $this->skill->title;
    }

    #[Layout('layouts.admin.main')]
    public function render(): View
    {
        return view('livewire.admin.skill.edit');
    }

    public function update(): void
    {
        $data = $this->form->validate();

        $this->skill->update($data);

        $this->redirect(route('admin.skills.index'));
    }
}
