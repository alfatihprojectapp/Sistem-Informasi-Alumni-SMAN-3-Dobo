<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    use HasFactory;

    protected $guarded = ['id_tahun'];

    protected $table = 'tahun_akademik';

    protected $primaryKey = 'id_tahun';

    public function user()
    {
        return $this->hasOne(User::class, 'id_tahun');
    }

    public function alumni()
    {
        return $this->hasMany(Alumni::class, 'id_tahun');
    }

}
