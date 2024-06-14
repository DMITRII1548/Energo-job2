<?php

namespace App\Livewire\Admin\Profession;

use App\Livewire\Forms\Admin\Profession\UpdateForm;
use App\Models\ParentProfession;
use App\Models\Profession;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Edit extends Component
{
    public Profession $profession;
    public $parentProfessions;

    public UpdateForm $form;

    public function mount(): void
    {
        $this->parentProfessions = ParentProfession::all();
        $this->form->title = $this->profession->title;
        $this->form->parent_profession_id = $this->profession->parent_profession_id;
    }

    #[Layout('layouts.admin.main')]
    public function render(): View
    {
        return view('livewire.admin.profession.edit');
    }

    public function update(): void
    {
        $data = $this->form->validate();

        $this->profession->update($data);

        $this->redirect(route('admin.professions.index'));
    }
}
