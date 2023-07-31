<?php

namespace App\Http\Livewire\Dashboard\Jurusan;

use App\Models\Jurusan;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showLivewireCreate = false;
    public $showLivewireUpdate = false;
    public $showLivewireDelete = false;

    public $getJurusan = 15;

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

        $jurusan = Jurusan::where('id_jurusan', $id)->first();
        $this->getJurusan = $jurusan;
    }
    public function handleUpdated()
    {
        $this->showLivewireUpdate = false;
    }

    // // delete
    public function delete($id)
    {
        $this->showLivewireDelete = true;

        $jurusan = Jurusan::where('id_jurusan', $id)->first();

        $this->getJurusan = $jurusan->id_jurusan;
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
        return view('livewire.dashboard.jurusan.index', [
            'title' => 'Daftar Jurusan',
            'icon' => '<i class="bi bi-journal-check"></i>',
            'title_page' => 'Daftar Jurusan',
            'jurusan' => $this->search == null ?
                Jurusan::orderBy('nama_jurusan')->paginate($this->paginate) :
                Jurusan::where('nama_jurusan', 'like', '%' . $this->search . '%')->orderBy('nama_jurusan')->paginate($this->paginate)
        ])->extends('dashboard-layouts.app')->section('container');
    }
}
