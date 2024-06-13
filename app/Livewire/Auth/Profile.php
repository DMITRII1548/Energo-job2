<?php

namespace App\Livewire\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $user;

    public function mount(): void
    {
        $this->redirect(route('profiles.index'));
        $this->user = Auth::user();
    }

    public function logout(): void
    {
        Auth::logout();

        $this->redirect(route('auth.login'));
    }

    public function render(): View
    {
        $this->redirect(route('profiles.index'));
        return view('livewire.auth.profile');
    }
}
