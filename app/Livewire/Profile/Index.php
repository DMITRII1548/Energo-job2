<?php

namespace App\Livewire\Profile;

use App\Models\ParentProfession;
use App\Models\Profession;
use App\Models\Profile;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;


class Index extends Component
{
    public $profiles;
    public $professions;
    public ?int $activeProfessionId = null;
    public ?int $activeParentProfessionId = null;

    public function mount(): void
    {
        $this->professions = Profession::all();
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

    public function sortByParentProfession(ParentProfession $profession)
    {
        // $this->profiles = $profession->professions()->profiles->where('is_published', true);
        $this->professions = $profession->professions;
    }

    #[Layout('layouts.main')]
    public function render(): View
    {
        return view('livewire.profile.index', [
            'professions' => $this->professions,
            'parentProfessions' => ParentProfession::all()
        ]);
    }
}
