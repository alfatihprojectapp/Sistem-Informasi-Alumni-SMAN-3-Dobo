<?php

namespace App\Http\Livewire;

use App\Models\Alumni;
use App\Models\TahunAkademik;
use Livewire\Component;
use Livewire\WithPagination;

class DaftarAlumni extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 20;
    public $search;
    public $search_nama;

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

        return view('livewire.daftar-alumni', [
            'alumni' => $alumni->paginate($this->paginate),
            'dataTahun' => TahunAkademik::orderBy('tahun', 'ASC')->get()

        ])->layout('index');
    }
}
