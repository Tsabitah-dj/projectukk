<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ahliwaris extends Model
{
    //
    protected $table="ahliwaris";
    protected $fillable=['nama_pemohon','tanggal','no_register','alamat','bukti_register','nama_alm'];
}
