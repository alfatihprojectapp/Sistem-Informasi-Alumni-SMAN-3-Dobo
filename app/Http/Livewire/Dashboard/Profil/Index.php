<?php

namespace App\Http\Livewire\Dashboard\Profil;

use App\Models\ProfilInstansi;
use Livewire\Component;

class Index extends Component
{
    public $showUpdateNama = false;
    public $showUpdateUsername = false;
    public $showUpdatePassword = false;
    public $showUpdateEmail = false;

    public $getUser;

    protected $listeners = [
        'namaUpdated' => 'handleNamaUpdated',
        'usernameUpdated' => 'handleUsernameUpdated',
        'passwordUpdated' => 'handlePasswordUpdated',

        'closeLivewire' => 'handleCloseLivewire'
    ];

    // update nama
    public function updateNama()
    {
        $this->showUpdateNama = true;
    }

    public function handleNamaUpdated()
    {
        $this->showUpdateNama = false;
    }

    // update email
    public function updateEmail()
    {
        $this->showUpdateEmail = true;
    }

    public function handleUsernameUpdated()
    {
        $this->showUpdateEmail = false;
    }

    // update password
    public function updatePassword()
    {
        $this->showUpdatePassword = true;
    }

    public function handlePasswordUpdated()
    {
        $this->showUpdatePassword = false;
    }

    public function handleCloseLivewire()
    {
        $this->showUpdateNama = false;
        $this->showUpdateUsername = false;
        $this->showUpdateEmail = false;
        $this->showUpdatePassword = false;
    }

    public function render()
    {
        return view('livewire.dashboard.profil.index', [
            'title' => 'Sistem Informasi Alumni | Dashboard - Profil',
            'icon' => '<i class="bi bi-person-check"></i>',
            'title_page' => 'Profil',
            // 'profil' => ProfilInstansi::first(),
        ])->extends('dashboard-layouts.app')->section('container');
    }
}
