<?php

namespace App\Http\Livewire\Dashboard\TahunPendaftaran;

use App\Models\TahunPendaftaran;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showLivewireCreate = false;
    public $showLivewireUpdate = false;
    public $showLivewireDelete = false;

    public $showTahunRegister = false;
    public $switchOn = false;
    public $switchOff = false;

    public $paginate = 15;
    public $search;

    public $getTahunPendaftaran;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'stored' => 'handleStored',
        'updated' => 'handleUpdated',
        'deleted' => 'handleDeleted',

        'closeLivewire' => 'handleCloseLivewire',

        'switchOnSuccess' => 'handleSwitchOnSuccess',
        'switchOffSuccess' => 'handleSwitchOffSuccess',
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

        $tahun = TahunPendaftaran::where('id_tahun', $id)->first();
        $this->getTahunPendaftaran = $tahun;
    }
    public function handleUpdated()
    {
        $this->showLivewireUpdate = false;
    }

    // delete
    public function delete($id)
    {
        $this->showLivewireDelete = true;

        $tahun = TahunPendaftaran::where('id_tahun', $id)->first();

        $this->getTahunPendaftaran = $tahun->id_tahun;
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


    public function pilihTahun($id)
    {
        $tahun = TahunPendaftaran::where('id_tahun', $id)->first();

        $this->switchOn = true;

        $this->emit('switchOn', $tahun);
    }

    public function handleSwitchOnSuccess()
    {
        $this->switchOn = false;
    }

    public function cancelTahun($id)
    {
        $tahun = TahunPendaftaran::where('id_tahun', $id)->first();

        $this->switchOff = true;

        $this->emit('switchOff', $tahun);
    }

    public function handleSwitchOffSuccess()
    {
        $this->switchOff = false;
    }

    public function render()
    {
        return view('livewire.dashboard.tahun-pendaftaran.index', [
            'title' => 'Tahun Pendaftaran',
            'icon' => '<i class="bi bi-calendar-check"></i>',
            'title_page' => 'Tahun Pendaftaran',
            'tahun_is_actived' => TahunPendaftaran::where('is_actived', 1)->count(),
            'tahun' => $this->search == null ?
                TahunPendaftaran::orderBy('id_tahun', 'DESC')->paginate($this->paginate) :
                TahunPendaftaran::where('tahun', 'like', '%' . $this->search . '%')->orderBy('id_tahun', 'DESC')->paginate($this->paginate)
        ])->extends('dashboard-layouts.app')->section('container');
    }
}
