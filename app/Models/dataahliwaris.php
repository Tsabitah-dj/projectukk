<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dataahliwaris extends Model
{
    //
    protected $table = 'dataahliwaris';
    protected $fillable = ['nama_alm','nama_pewaris','hubungan_keluarga','tanggal_lahir','alamat', ];
}
