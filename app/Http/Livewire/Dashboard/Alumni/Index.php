<?php

namespace App\Http\Livewire\Dashboard\Alumni;

use App\Models\Alumni;
use App\Models\TahunAkademik;
use App\Models\User;
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
        return redirect('/dashboard/export-alumni/excel/'.$id);
    }

    public function render()
    {
            // $alumni = null;
            if ($this->search_nama && !$this->search) {
                $alumni = Alumni::where('nama', 'like', '%' . $this->search_nama . '%')
                    ->orderBy('nama');
            } else if ($this->search && !$this->search_nama) {
                $alumni = Alumni::where('id_tahun', 'like', '%' . $this->search . '%')
                    ->orderBy('nama');
            } else if ($this->search && $this->search_nama) {
                $alumni = Alumni::where('id_tahun', 'like', '%' . $this->search . '%')
                    ->where('nama', 'like', '%' . $this->search_nama . '%')
                    ->orderBy('nama');
            } else {
                $alumni = Alumni::orderBy('id_tahun')->orderBy('nama');
            }

        return view('livewire.dashboard.alumni.index', [
            'title' => 'Sistem Informasi Alumni SMA Negeri 3 Dobo | Dashboard - Daftar Alumni',
            'icon' => '<i class="bi bi-people"></i>',
            'title_page' => 'Daftar Alumni',
            'alumni' => $alumni->paginate($this->paginate),
            'dataTahun' => TahunAkademik::orderBy('tahun', 'ASC')->get()

        ])->extends('dashboard-layouts.app')->section('container');
    }
}
