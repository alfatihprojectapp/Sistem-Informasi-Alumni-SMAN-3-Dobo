<?php

namespace App\Http\Controllers\Dashboard\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Siswa;
use App\Models\TahunPendaftaran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class Cetak extends Controller
{
    public function cetak(Request $request)
    {

        $jurusan = Jurusan::where('kode_jurusan', $request->jurusan)->first();
        $tahun = TahunPendaftaran::where('tahun', $request->tahun)->first();

        $data = [
            'title' => 'Data Pendaftaran Siswa Baru Jurusan ' . $jurusan->nama_jurusan . ' Tahun ' . $tahun->tahun,
            'siswa' => Siswa::where('id_jurusan', $jurusan->id_jurusan)->where('id_tahun', $tahun->id_tahun)->get(),
            'jurusan' => $jurusan->nama_jurusan,
            'tahun_pendaftaran' => $tahun->tahun
        ];

        $pdf = PDF::loadView('laporan.siswa', $data);

        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('pendaftaran-siswa-baru-jurusan-' . strtolower($jurusan->nama_jurusan) . '-' . $tahun->tahun . '.pdf');
    }
}
