<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = ['id_siswa'];

    protected $table = 'siswa';

    protected $primaryKey = 'id_siswa';

    protected $with = ['jurusan', 'user'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
