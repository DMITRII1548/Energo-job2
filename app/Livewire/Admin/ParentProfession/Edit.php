<?php

namespace App\Livewire\Admin\ParentProfession;

use App\Livewire\Forms\Admin\ParentProfession\UpdateForm;
use App\Models\ParentProfession;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Edit extends Component
{
    public ParentProfession $profession;

    public UpdateForm $form;

    public function mount(): void
    {
        $this->form->title = $this->profession->title;
    }

    #[Layout('layouts.admin.main')]
    public function render(): View
    {
        return view('livewire.admin.parent-profession.edit');
    }

    public function update(): void
    {
        $data = $this->form->validate();

        $this->profession->update($data);

        $this->redirect(route('admin.parent-professions.index'));
    }
}
