<?php

namespace App\Livewire\Admin\Profession;

use App\Livewire\Forms\Admin\Profession\StoreForm;
use App\Models\Profession;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Create extends Component
{
    public StoreForm $form;
    
    #[Layout('layouts.admin.main')]
    public function render()
    {
        return view('livewire.admin.profession.create');
    }

    public function store(): void
    {
        $data = $this->form->validate();
        
        Profession::create($data);

        $this->redirect(route('admin.professions.index'));
    }
}
