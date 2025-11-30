<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ahliwaris extends Model
{
    //
    protected $table="ahliwaris";
    protected $fillable=['dataahliwaris_id','tanggal','no_register','alamat'];

    public function dataahliwaris()
    {
        return $this->belongsTo(dataahliwaris::class, 'dataahliwaris_id');
    }
}
