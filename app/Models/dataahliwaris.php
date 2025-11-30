<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dataahliwaris extends Model
{
    //
    protected $table = 'dataahliwaris';
    protected $fillable = ['nama_pewaris','nama_ahliwaris','hubungan_keluarga','tanggal_lahir','alamat','dokumen'];

    public function ahliwaris()
    {
        return $this->hasMany(ahliwaris::class, 'dataahliwaris_id');
    }
}
