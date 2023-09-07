<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Delete extends Component
{
    public $closeModal = false;

    // data request
    public $admin;
    public $nama;
    public $idDelete;


    public function mount($user)
    {
        $data = User::where('id', $user)->first();

        $this->admin = $data->admin;
        $this->nama = $data->nama;
        $this->idDelete = $user;
    }

    public function destroy($id)
    {

        User::destroy('id', $id);

        $this->emit('deleted');

        $this->closeModal = true;

        session()->flash('message');
    }

    public function render()
    {
        return view('livewire.dashboard.user.delete');
    }
}
