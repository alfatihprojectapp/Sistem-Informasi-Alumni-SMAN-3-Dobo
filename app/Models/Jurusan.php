<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $guarded = ['id_jurusan'];

    protected $table = 'jurusan';

    protected $primaryKey = 'id_jurusan';

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_jurusan');
    }
}
