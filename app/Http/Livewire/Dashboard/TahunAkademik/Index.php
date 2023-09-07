<?php

namespace App\Http\Livewire\Dashboard\TahunAkademik;

use App\Models\TahunAkademik;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showLivewireCreate = false;
    public $showLivewireUpdate = false;
    public $showLivewireDelete = false;

    public $getTahun;

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

        $tahun = TahunAkademik::where('id_tahun', $id)->first();
        $this->getTahun = $tahun;
    }
    public function handleUpdated()
    {
        $this->showLivewireUpdate = false;
    }

    // delete
    public function delete($id)
    {
        $this->showLivewireDelete = true;

        $tahun = TahunAkademik::where('id_tahun', $id)->first();
        $this->getTahun = $tahun->id_tahun;
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

    public function render()
    {
        return view('livewire.dashboard.tahun-akademik.index', [
            'title' => 'Sistem Informasi Alumni SMA Negeri 3 Dobo | Dashboard - Tahun Angkatan',
            'icon' => '<i class="bi bi-table"></i>',
            'title_page' => 'Tahun Angkatan',
            'tahun' => $this->search == null ?
                TahunAkademik::orderBy('tahun', 'ASC')->paginate($this->paginate) :
                TahunAkademik::where('tahun', 'like', '%' . $this->search . '%')->orderBy('tahun', 'ASC')->paginate($this->paginate)
        ])->extends('dashboard-layouts.app')->section('container');
    }   
}
