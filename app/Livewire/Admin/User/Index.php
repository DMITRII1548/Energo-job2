<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Layout('layouts.admin.main')]
    public function render(): View
    {
        return view('livewire.admin.user.index', [
            'users' => User::query()
                ->where('id', '!=', Auth::user()->id)
                ->paginate(15)
        ]);
    }

    public function changeStatus(User $user): void
    {
        $user->profile->update([
            'is_published' => !$user->profile->is_published
        ]);
    }

    public function destroy(User $user): void
    {
        $profile = $user->profile;

        if ($profile) {
            $profile->skills()->detach();
            $profile->professions()->detach();

            if (isset($profile->avatar)) {
                Storage::disk('public')->delete($profile->avatar);
            }
            
            
            $profile->delete();
        }

        $user->delete();
    }
}
