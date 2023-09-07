<?php

namespace App\Imports;

use App\Models\Alumni;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class AlumniImport2 implements
    ToModel,
    WithHeadingRow,
    SkipsOnError,
    WithValidation,
    SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    public $user;

    public function model(array $row)
    {
        $this->user = Auth()->user();

        return new Alumni([
            'id_tahun' => $this->user->tahun->id_tahun,
            'nama' => strtoupper($row['nama']),
            'jenis_kelamin' => $row['jenis_kelamin'],
            'nomor_handphone' => $row['nomor_handphone'],
            'pekerjaan' => $row['pekerjaan'],
            'alamat' => $row['alamat'],
        ]);
    }

    public function rules(): array
    {

        return [
            // '*.id_tahun' => ['required', 'max:255'],
            '*.nama' => ['required', 'max:255'],
            '*.jenis_kelamin' => ['in:Laki-Laki,Perempuan'],
            '*.nomor_handphone' => ['required', 'max:255', 'unique:alumni,nomor_handphone'],
            '*.pekerjaan' => ['max:255'],
            '*.alamat' => ['required', 'max:255']
        ];
    }
}
