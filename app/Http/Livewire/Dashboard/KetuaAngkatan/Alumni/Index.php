<?php

namespace App\Http\Livewire\Dashboard\KetuaAngkatan\Alumni;

use App\Models\Alumni;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showLivewireCreate = false;
    public $showLivewireUpdate = false;
    public $showLivewireDelete = false;

    public $getAlumni;

    public $paginate = 20;
    public $search;
    public $search_nama;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'stored' => 'handleStored',
        'updated' => 'handleUpdated',
        'deleted' => 'handleDeleted',

        'closeLivewire' => 'handleCloseLivewire'
    ];

    // create
    public function create()
    {
        $this->showLivewireCreate = true;
    }
    public function handleStored()
    {
        $this->showLivewireCreate = false;
    }

    // edit
    public function edit($id)
    {
        $this->showLivewireUpdate = true;

        $alumni = Alumni::where('id_alumni', $id)->first();
        $this->getAlumni = $alumni;
    }
    public function handleUpdated()
    {
        $this->showLivewireUpdate = false;
    }

    // delete
    public function delete($id)
    {
        $this->showLivewireDelete = true;

        $alumni = Alumni::where('id_alumni', $id)->first();
        $this->getAlumni = $alumni->id_alumni;
    }
    public function handleDeleted()
    {
        $this->showLivewireDelete = false;
    }

    public function handleCloseLivewire()
    {
        $this->showLivewireCreate = false;
        $this->showLivewireUpdate = false;
        $this->showLivewireDelete = false;
    }

    public function ExportExcel($id)
    {
        return redirect('/dashboard/export-alumni/excel/' . $id);
    }

    public function render()
    {
        $user = Auth()->user();

        return view('livewire.dashboard.ketua-angkatan.alumni.index', [
            'title' => 'Sistem Informasi Alumni SMA Negeri 3 Dobo | Dashboard - Daftar Alumni ' . $user->tahun->tahun,
            'icon' => '<i class="bi bi-people"></i>',
            'title_page' => 'Daftar Alumni ' . $user->tahun->tahun,
            'alumni' => $this->search == null ?
                Alumni::where('id_tahun', $user->tahun->id_tahun)->orderBy('nama')->paginate($this->paginate) :
                Alumni::where('id_tahun', $user->tahun->id_tahun)
                ->where('nama', 'like', '%' . $this->search . '%')->orderBy('nama')
                ->paginate($this->paginate),
            'user' => $user
        ])->extends('dashboard-layouts.app')->section('container');
    }
}
