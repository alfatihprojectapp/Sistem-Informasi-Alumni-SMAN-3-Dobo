<?php

namespace App\Http\Livewire\Dashboard\Informasi;

use App\Models\Informasi;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showLivewireCreate = false;
    public $showLivewireUpdate = false;
    public $showLivewireDelete = false;

    public $paginate = 15;
    public $search;

    public $getInformasi;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'stored' => 'handleStored',
        'updated' => 'handleUpdated',
        'deleted' => 'handleDeleted',

        'closeLivewire' => 'handleCloseLivewire',
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

        $informasi = Informasi::where('id_informasi', $id)->first();
        $this->getInformasi = $informasi;
    }
    public function handleUpdated()
    {
        $this->showLivewireUpdate = false;
    }

    // delete
    public function delete($id)
    {
        $this->showLivewireDelete = true;

        $informasi = Informasi::where('id_informasi', $id)->first();

        $this->getInformasi = $informasi->id_informasi;
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
        return view('livewire.dashboard.informasi.index', [
            'title' => 'Informasi Pendaftaran',
            'icon' => '<i class="bi bi-info-circle"></i>',
            'title_page' => 'Informasi Pendaftaran',
            'informasi' => $this->search == null ?
                Informasi::orderBy('created_at', 'DESC')->paginate($this->paginate) :
                Informasi::where('isi_informasi', 'like', '%' . $this->search . '%')->orderBy('created_at', 'DESC')->paginate($this->paginate)
        ])->extends('dashboard-layouts.app')->section('container');
    }
}
