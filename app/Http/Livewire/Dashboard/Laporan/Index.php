<?php

namespace App\Http\Livewire\Dashboard\Laporan;

use App\Models\Jurusan;
use App\Models\Siswa;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $showLivewireShow = false;
    public $showLivewirePilihTahun = false;
    public $showLivewireDelete = false;

    public $paginate = 15;
    public $search;

    public $getSiswa;
    public $getJurusan;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'deleted' => 'handleDeleted',

        'closeLivewire' => 'handleCloseLivewire'
    ];

    // show
    public function show($id)
    {
        $this->showLivewireShow = true;

        $siswa = Siswa::where('id_siswa', $id)->first();
        $this->getSiswa = $siswa;
    }

    public function cetakJurusan($id)
    {
        $this->showLivewirePilihTahun = true;

        $jurusan = Jurusan::where('id_jurusan', $id)->first();
        $this->getJurusan = $jurusan;
    }

    // delete
    public function delete($id)
    {
        $this->showLivewireDelete = true;

        $siswa = Siswa::where('id_siswa', $id)->first();

        $this->getSiswa = $siswa->id_siswa;
    }

    public function handleDeleted()
    {
        $this->showLivewireDelete = false;
    }

    public function handleCloseLivewire()
    {
        $this->showLivewireShow = false;
        $this->showLivewireDelete = false;
        $this->showLivewirePilihTahun = false;
    }

    public function render()
    {
        return view('livewire.dashboard.laporan.index', [
            'title' => 'Laporan Pendaftaran Siswa',
            'icon' => '<i class="bi bi-person-lines-fill"></i>',
            'title_page' => 'Laporan Pendaftaran Siswa',
            'jurusan' => Jurusan::orderBy('nama_jurusan')->get(),
            'siswa' => $this->search == null ?
                Siswa::where('completed', '=', 1)->orderBy('id_jurusan')->paginate($this->paginate) :
                Siswa::where('completed', '=', 1)->where('nama', 'like', '%' . $this->search . '%')
                ->orderBy('id_jurusan')->paginate($this->paginate)
        ])->extends('dashboard-layouts.app')->section('container');
    }
}
