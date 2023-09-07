<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $guarded = ['id_alumni'];

    protected $table = 'alumni';

    protected $primaryKey = 'id_alumni';

    protected $with = ['tahun'];


    public function tahun()
    {
        return $this->belongsTo(TahunAkademik::class, 'id_tahun');
    }

}
