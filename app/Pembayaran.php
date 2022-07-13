<?php

namespace App;

use App\Http\Controllers\PembayaranController;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        "tgl_bayar",
        "jumlah_bayar",
        "id_spp",
        "id_user",
        "nisn"
    ];
}
