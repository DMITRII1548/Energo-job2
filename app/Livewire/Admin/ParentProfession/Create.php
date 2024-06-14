<?php

namespace App\Livewire\Admin\ParentProfession;

use App\Livewire\Forms\Admin\ParentProfession\StoreForm;
use App\Models\ParentProfession;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Create extends Component
{
    public StoreForm $form;
    
    #[Layout('layouts.admin.main')]
    public function render()
    {
        return view('livewire.admin.parent-profession.create');
    }

    public function store(): void
    {
        $data = $this->form->validate();
        
        ParentProfession::create($data);

        $this->redirect(route('admin.parent-professions.index'));
    }
}
