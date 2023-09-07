<?php

namespace App\Exports;

use App\Models\Alumni;
use App\Models\TahunAkademik;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportAlumni implements FromView
{
    public $id_tahun;

    public function __construct($id)
    {
        $this->id_tahun = $id;
    }

    public function view(): View
    {
        $tahunAngkatan = TahunAkademik::where('id_tahun', $this->id_tahun)->first();

        return view('exports.daftar-alumni', [
            'alumni' => Alumni::where('id_tahun', '=', $this->id_tahun)->orderBy('nama')->get(),
            'tahunAngkatan' => $tahunAngkatan
        ]);
    }
}
