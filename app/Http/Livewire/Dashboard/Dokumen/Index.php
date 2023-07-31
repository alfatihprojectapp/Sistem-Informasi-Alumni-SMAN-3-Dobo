<?php

namespace App\Http\Livewire\Dashboard\Dokumen;

use App\Models\Siswa;
use Livewire\Component;

class Index extends Component
{
    public $showLivewireUpdate = false;
    public $getSiswa;

    protected $listeners = [
        'updated' => 'handleUpdated',

        'closeLivewire' => 'handleCloseLivewire'
    ];

    public function edit($id)
    {
        $this->showLivewireUpdate = true;

        $siswa = Siswa::where('id_siswa', $id)->first();
        $this->getSiswa = $siswa;
    }

    public function handleUpdated()
    {
        $this->showLivewireUpdate = false;
    }

    public function handleCloseLivewire()
    {
        $this->showLivewireUpdate = false;
    }

    public function render()
    {
        $user = auth()->user();

        return view('livewire.dashboard.dokumen.index', [
            'title' => 'Dokumen Calon Siswa Baru',
            'icon' => '<i class="bi bi-folder-check"></i>',
            'title_page' => 'Dokumen Pendaftaran',
            'siswa' => $user->siswa
        ])->extends('dashboard-layouts.app')->section('container');
    }
}
