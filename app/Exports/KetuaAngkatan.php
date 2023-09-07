<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class KetuaAngkatan implements FromView
{
    public function view(): View
    {
        return view('exports.daftar-ketua-angkatan', [
            'ketua_angkatan' => User::where('admin', '=', 0)->orderBy('id_tahun')->get()
        ]);
    }
}
