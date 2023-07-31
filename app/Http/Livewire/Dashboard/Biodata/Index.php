<?php

namespace App\Http\Livewire\Dashboard\Biodata;

use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
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

        return view('livewire.dashboard.biodata.index', [
            'title' => 'Biodata Calon Siswa Baru',
            'icon' => '<i class="bi bi-person-fill"></i>',
            'title_page' => 'Biodata Calon Siswa Baru',
            'siswa' => $user->siswa,
            'dataJurusan' => Jurusan::orderBy('nama_jurusan')->get()
        ])->extends('dashboard-layouts.app')->section('container');
    }
}
