<?php

namespace App\Http\Controllers;

use App\Exports\ExportAlumni;
use App\Exports\KetuaAngkatan;
use App\Exports\SiswaExport;
use App\Models\TahunAkademik;
use App\Models\TahunPendaftaran;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportKetuaAngkatan()
    {
        return Excel::download(
            new KetuaAngkatan,
            'daftar-ketua-angkatan.xlsx'
        );
    }

    public function exportAlumni(TahunAkademik $tahun)
    {
        return Excel::download(new ExportAlumni($tahun->id_tahun), 'daftar-alumni-'.$tahun->tahun.'.xlsx');
    }
}
