<?php

namespace App\Imports;

use App\Models\TahunAkademik;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;


class KetuaAngkatan implements
    ToModel,
    WithHeadingRow,
    SkipsOnError,
    WithValidation,
    SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    public $tahun;

    public function model(array $row)
    {
        $this->tahun = TahunAkademik::where('id_tahun', $row['id_tahun'])->first();
        
        if ($this->tahun) {
            $username =  $this->tahun->id_tahun.''. strtoupper(Str::random(3)).''. mt_rand(000,999).''.$this->tahun->tahun;
            return new User([
                'id_tahun' => $this->tahun->id_tahun,
                'nama' => strtoupper($row['nama']),
                'jenis_kelamin' => $row['jenis_kelamin'],
                'nomor_handphone' => $row['nomor_handphone'],
                'pekerjaan' => $row['pekerjaan'],
                'alamat' => $row['alamat'],
                'username' => $username,
                'password' => password_hash($username, PASSWORD_DEFAULT)

            ]);
        }
    }

    public function rules(): array
    {

        return [
            '*.id_tahun' => ['required', 'max:255', 'unique:users,id_tahun'],
            '*.nama' => ['required', 'max:255'],
            '*.jenis_kelamin' => ['in:Laki-Laki,Perempuan'],
            '*.nomor_handphone' => ['required', 'max:255', 'unique:users,nomor_handphone'],

            '*.pekerjaan' => ['max:255'],
            '*.alamat' => ['required', 'max:255']
        ];
    }
}
