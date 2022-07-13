<?php

namespace App\Exports;

use App\Gedung;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Http\Controllers\GedungController;

class GedungExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Gedung::select('id', 'kode_gedung', 'nama_gedung', 'deskripsi_gedung')->get();
    }    

    public function headings(): array{
        return["id", "kode_gedung", "nama_gedung", "deskripsi_gedung"];
        
    }
}
