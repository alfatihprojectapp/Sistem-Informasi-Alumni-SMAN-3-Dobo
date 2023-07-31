<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunPendaftaran extends Model
{
    use HasFactory;

    protected $guarded = ['id_tahun'];

    protected $table = 'tahun_pendaftaran';

    protected $primaryKey = 'id_tahun';

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_tahun');
    }
}
