<?php

namespace App\Livewire\Profile;

use App\Livewire\Forms\Profile\UpdateOrCreateForm;
use App\Models\Profession;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateOrCreate extends Component
{
    use WithFileUploads;

    public array $selectedSkillIds = [];
    public array $selectedProfessionsIds = [];

    public bool $isCreatedOrUpdated = false;

    public int $skill;
    public int $profession;

    public $selectedSkills = [];
    public $selectedProfessions = [];

    public UpdateOrCreateForm $form;

    public function mount(): void
    {
        $user = User::find(Auth::user()->id);

        $this->form->name = $user->name;
        $this->form->phonenumber = $user->phonenumber;

        if ($user->profile) {
            $this->form->expirience = $user->profile->expirience;
            $this->form->portfolio = $user->profile->portfolio;

            foreach ($user->profile->skills as $skill) {
                $this->selectedSkillIds[] = $skill->id;
                $this->selectedSkills[] = $skill;
            }

            foreach ($user->profile->professions as $profession) {
                $this->selectedProfessionsIds[] = $profession->id;
                $this->selectedProfessions[] = $profession;
            }
        }
    }

    public function render(): View
    {
        return view('livewire.profile.update-or-create', [
            'professions' => Profession::all(),
            'skills' => Skill::all()
        ]);
    }

    public function updateOrCreate(): void
    {
        $data = $this->form->validate();
        $user = User::find(Auth::user()->id);
        $profile = $user->profile;

        if (empty($this->selectedProfessionsIds)) {
            $this->form->addError('professions', 'Нужно выбрать как минимум одну профессию');
            return;
        }

        if (empty($this->selectedSkillIds)) {
            $this->form->addError('skills', 'Нужно выбрать как минимум один навык');
            return;
        }

        $user->update([
            'name' => $data['name'],
            'phonenumber' => $data['phonenumber'],
        ]);

        if ($user->profile) {
            $user->profile->update([
                'expirience' => $data['expirience'],
                'portfolio' => $data['portfolio']
            ]);
        } else {

            $profile = $user->profile()->create([
                'expirience' => $data['expirience'],
                'portfolio' => $data['portfolio']
            ]);
        }

        if ($this->form->avatar) {
            if (isset($user->profile->avatar)) {
                Storage::disk('public')->delete($user->profile->avatar);
            }

            $imagePath = $this->form->avatar->store(path: 'images');

            $profile->update([
                    'avatar' => $imagePath,
                ]);
        }

        $profile->skills()->sync($this->selectedSkillIds);
        $profile->professions()->sync($this->selectedProfessionsIds);

        $user->update([
            'profile_id' => $profile->id
        ]);

        $profile->update([
            'is_published' => false
        ]);

        $this->isCreatedOrUpdated = true;
    }

    public function addSkill(): void
    {
        $id = $this->skill;

        if (!in_array($id, $this->selectedSkillIds)) {
            $this->selectedSkillIds[] = $id;
            $this->selectedSkills[] = Skill::find($id);
        }
    }

    public function addProfession(): void
    {
        $id = $this->profession;

        if (!in_array($id, $this->selectedProfessionsIds)) {
            $this->selectedProfessionsIds[] = $id;
            $this->selectedProfessions[] = Profession::find($id);
        }
    }

    public function destroySkill(int $id): void
    {
        $skillIdKey = array_search($id, $this->selectedSkillIds);

        if (is_int($skillIdKey)) {
            unset($this->selectedSkillIds[$skillIdKey]);
        }

        foreach ($this->selectedSkills as $key => $skill) {
            if ($skill->id === $id) {
                unset($this->selectedSkills[$key]);
                break;
            }
        }
    }

    public function destroyProfession(int $id): void
    {
        $professionIdKey = array_search($id, $this->selectedProfessionsIds);
        if (is_int($professionIdKey)) {
            unset($this->selectedProfessionsIds[$professionIdKey]);
        }

        foreach ($this->selectedProfessions as $key => $skill) {
            if ($skill->id === $id) {
                unset($this->selectedProfessions[$key]);
                break;
            }
        }
    }
}
