<?php

namespace App\Livewire\Profile;

use App\Livewire\Forms\Profile\UpdateOrCreateForm;
use App\Models\Gallery;
use App\Models\Profession;
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
    public array $selectedProfessionsIds = [];

    public bool $isCreatedOrUpdated = false;

    public int $profession;

    public $selectedProfessions = [];
    public $gallery;

    public $galleries = [];

    public UpdateOrCreateForm $form;

    public function mount(): void
    {
        $user = User::find(Auth::user()->id);

        $this->form->name = $user->name;
        $this->form->phonenumber = $user->phonenumber;

        if ($user->profile) {
            $this->form->expirience = $user->profile->expirience;
            $this->form->portfolio = $user->profile->portfolio;
            $this->form->skills = $user->profile->skills;


            foreach ($user->profile->professions as $profession) {
                $this->selectedProfessionsIds[] = $profession->id;
                $this->selectedProfessions[] = $profession;
            }

            $this->galleries = $user->profile->galleries;
        }
    }

    public function render(): View
    {
        return view('livewire.profile.update-or-create', [
            'professions' => Profession::all(),
            'galleries' => $this->galleries,
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

        $user->update([
            'name' => $data['name'],
            'phonenumber' => $data['phonenumber'],
        ]);

        if ($user->profile) {
            $user->profile->update([
                'expirience' => $data['expirience'],
                'portfolio' => $data['portfolio'],
                'skills' => $data['skills'],
            ]);
        } else {

            $profile = $user->profile()->create([
                'expirience' => $data['expirience'],
                'portfolio' => $data['portfolio'],
                'skills' => $data['skills'],
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

        $profile->professions()->sync($this->selectedProfessionsIds);

        $user->update([
            'profile_id' => $profile->id
        ]);

        $profile->update([
            'is_published' => true
        ]);

        if ($this->gallery) {
            foreach ($this->gallery as $gal) {
                $galPath = $gal->store(path: 'images');

                $gallery = new Gallery(['image' => $galPath]);
                $profile->galleries()->save($gallery);;
            }
        }

        $this->isCreatedOrUpdated = true;
    }

    public function addProfession(): void
    {
        $id = $this->profession;

        if (!in_array($id, $this->selectedProfessionsIds)) {
            $this->selectedProfessionsIds[] = $id;
            $this->selectedProfessions[] = Profession::find($id);
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

    public function destroyGallery(int $id): void
    {
        $gallery = Gallery::find($id);

        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();

        $user = User::find(Auth::user()->id);

        $this->galleries = $user->profile->galleries;
    }
}
