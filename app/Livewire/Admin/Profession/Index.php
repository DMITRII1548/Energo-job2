<?php

namespace App\Livewire\Admin\Profession;

use App\Models\Profession;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.admin.main')]
    public function render(): View
    {
        return view('livewire.admin.profession.index', [
            'professions' => Profession::all()
        ]);
    }

    public function add(): void
    {
        $this->redirect(route('admin.professions.create'));
    }

    public function destroy(Profession $profession): void
    {
        $profession->profiles()->detach();
        $profession->delete();
    }

    public function edit(int $id): void
    {
        $this->redirect(route('admin.professions.edit', $id));
    }
}
