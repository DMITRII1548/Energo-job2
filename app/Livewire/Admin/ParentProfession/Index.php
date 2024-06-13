<?php

namespace App\Livewire\Admin\ParentProfession;

use App\Models\ParentProfession;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.admin.main')]
    public function render(): View
    {
        return view('livewire.admin.parent-profession.index', [
            'professions' => ParentProfession::all()
        ]);
    }

    public function add(): void
    {
        $this->redirect(route('admin.parent-professions.create'));
    }

    public function destroy(ParentProfession $profession): void
    {
        $professions = $profession->professions;

        foreach ($professions as $profession) {
            $profession->delete();
        }
        
        $profession->delete();
    }

    public function edit(int $id): void
    {
        $this->redirect(route('admin.parent-professions.edit', $id));
    }
}
