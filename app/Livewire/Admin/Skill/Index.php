<?php

namespace App\Livewire\Admin\Skill;

use App\Models\Skill;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.admin.main')]
    public function render(): View
    {
        return view('livewire.admin.skill.index', [
            'skills' => Skill::all()
        ]);
    }

    public function add(): void
    {
        $this->redirect(route('admin.skills.create'));
    }

    public function destroy(Skill $skill): void
    {
        $skill->profiles()->detach();
        $skill->delete();
    }

    public function edit(int $id): void
    {
        $this->redirect(route('admin.skills.edit', $id));
    }
}
