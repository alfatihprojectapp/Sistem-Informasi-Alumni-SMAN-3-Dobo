<?php

namespace App\Http\Controllers;

use App\Imports\AlumniImport2;
use App\Imports\ImportAlumni;
use App\Imports\KetuaAngkatan;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function importKetuaAngkatan(Request $request)
    {
        $validateData = $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        $file = $request->file('file');

        $import = new KetuaAngkatan;

        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }

        session()->flash('import_success');

        return redirect("/dashboard/daftar-ketua-angkatan");
    }

    public function importAlumni(Request $request)
    {
        $validateData = $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        $file = $request->file('file');

        $import = new ImportAlumni;

        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }

        session()->flash('import_success');

        return redirect("/dashboard/daftar-alumni");
    }

    public function importAlumni2(Request $request, TahunAkademik $tahun)
    {
        $validateData = $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        $file = $request->file('file');

        $import = new AlumniImport2;

        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }

        session()->flash('import_success');

        return redirect("/dashboard/daftar-alumni/".$tahun->id_tahun);
    }
}
