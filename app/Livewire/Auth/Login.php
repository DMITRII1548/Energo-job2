<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\LoginForm;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $form;

    public function login(): void
    {
        $data = $this->form->validate();

        $user = User::where('email', '=', $data['email'])->first();

        if (!is_null($user) && !$user->is_blocked) {
            if (Hash::check($data['password'], $user->password)) {
                Auth::login($user);
                $this->redirect(route('auth.profile'));
            } else {
                $this->form->addError('password', 'Неправильный логин или пароль');
            }
        } else {
        }
    }

    #[Layout('layouts.auth')]
    public function render(): View
    {
        return view('livewire.auth.login');
    }

    public function register(): void
    {
        $this->redirect(route('auth.register'));
    }
}
