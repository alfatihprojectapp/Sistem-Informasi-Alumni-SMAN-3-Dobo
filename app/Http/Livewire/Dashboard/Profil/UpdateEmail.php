<?php

namespace App\Http\Livewire\Dashboard\Profil;

use App\Models\User;
use Livewire\Component;

class UpdateEmail extends Component
{
    public $closeModal = false;

    public $email;

    public function update()
    {

        $this->validate([
            'email' => 'required|email|unique:users,email|max:255'
        ]);

        User::where('id', auth()->user()->id)->update([
            'email' => $this->email
        ]);

        $this->emit('emailUpdated');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.profil.update-email');
    }
}
