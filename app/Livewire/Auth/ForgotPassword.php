<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\ForgotPasswordForm;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ForgotPassword extends Component
{
    public ForgotPasswordForm $form;

    public $status = null;

    public function render(): View
    {
        return view('livewire.auth.forgot-password');
    }

    public function forgot(): void
    {
        $data = $this->form->validate();
 
        $this->status = Password::sendResetLink(
            $data
        );

        $this->status = __($this->status);
    }
}
