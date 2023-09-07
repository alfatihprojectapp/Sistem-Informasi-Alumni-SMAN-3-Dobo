<?php

namespace App\Http\Livewire\Dashboard\DaftarKetuaAngkatan;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showLivewireCreate = false;
    public $showLivewireUpdate = false;
    public $showLivewireDelete = false;

    public $getKetua;

    public $paginate = 15;
    public $search;

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

        $ketua = User::where('id', $id)->first();
        $this->getKetua = $ketua;
    }
    public function handleUpdated()
    {
        $this->showLivewireUpdate = false;
    }

    // delete
    public function delete($id)
    {
        $this->showLivewireDelete = true;

        $ketua = User::where('id', $id)->first();
        $this->getKetua = $ketua->id;
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

    public function ExportExcel()
    {
        return redirect('/dashboard/export-daftar-ketua-angkatan/excel');
    }

    public function render()
    {
        return view('livewire.dashboard.daftar-ketua-angkatan.index', [
            'title' => 'Sistem Informasi Alumni SMA Negeri 3 Dobo | Dashboard - Daftar Ketua Angkatan',
            'icon' => '<i class="bi bi-people"></i>',
            'title_page' => 'Daftar Ketua Angkatan',
            'ketua_angkatan' => $this->search == null ?
                User::where('admin', '=', 0)->orderBy('id_tahun')->paginate($this->paginate) :
                User::where('admin', '=', 0)
                ->where('nama', 'like', '%' . $this->search . '%')
                ->orderBy('id_tahun')->paginate($this->paginate)
        ])->extends('dashboard-layouts.app')->section('container');
    }   

}
