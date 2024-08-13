<?php

namespace App\Livewire\Profile;

use App\Models\Profile;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    public Profile $profile;

    #[Layout('layouts.main')]
    public function render()
    {
        return view('livewire.profile.show', [
            'profile' => $this->profile,
        ]);
    }
}
