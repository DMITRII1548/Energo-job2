<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\ResetPasswordForm;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Component;
use Illuminate\Support\Str;

class ResetPassword extends Component
{
    public string $token;

    public ResetPasswordForm $form;

    public function render()
    {
        return view('livewire.auth.reset-password');
    }

    public function resetPassword()
    {
        $data = $this->form->all();
        $data['token'] = $this->token;

        $status = Password::reset(
            $data,
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? $this->redirect(route('auth.login'))
                    : $this->form->addError('email', [__($status)]);
    }
}
