<?php

namespace App\Exports;

use App\Pembayaran;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Http\Controllers\PembayaranController;

class PembayaranExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pembayaran::select('id', 'tgl_bayar', 'jumlah_bayar', 'id_spp', 'id_user', 'nisn')->get();
    }

    public function headings(): array{
        return["id", "tgl_bayar", "jumlah_bayar", "id_spp", "id_user", "nisn"];
        
    }
}
