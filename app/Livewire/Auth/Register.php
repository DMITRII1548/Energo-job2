<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\RegisterForm;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Register extends Component
{
    public RegisterForm $form;

    public function register(): void
    {
        $data = $this->form->validate();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        Auth::login($user);

        $this->redirect(route('auth.profile'));
    }

    #[Layout('layouts.auth')]
    public function render(): View
    {
        return view('livewire.auth.register');
    }

    public function login(): void
    {
        $this->redirect(route('auth.login'));
    }
}
