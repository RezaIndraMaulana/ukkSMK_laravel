<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    protected $table = "gedungs";
    protected $fillable = [
        "kode_gedung",
        "nama_gedung",
        "deskripsi_gedung"
    ];
}
