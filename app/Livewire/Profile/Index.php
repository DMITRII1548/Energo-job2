<?php

namespace App\Livewire\Profile;

use App\Models\Profession;
use App\Models\Profile;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;


class Index extends Component
{
    public $profiles;
    public ?int $activeProfessionId = null;

    public function mount(): void
    {
        $this->profiles = Profile::query()
            ->where('is_published', true)
            ->get()
            ->load('user', 'skills');
    }

    public function sortByProfession(Profession $profession)
    {
        $this->activeProfessionId = $profession->id;
        $this->profiles = $profession->profiles->where('is_published', true);
    }

    #[Layout('layouts.main')]
    public function render(): View
    {
        return view('livewire.profile.index', [
            'professions' => Profession::all()
        ]);
    }
}
