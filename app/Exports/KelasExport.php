<?php

namespace App\Exports;

use App\Kelas;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Http\Controllers\KelasController;

class KelasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kelas::select('id', 'nama_kelas', 'kompetensi_keahlian', 'id_gedung')->get();
    }

    public function headings(): array{
        return["id", "nama_kelas", "kompetensi_keahlian", "id_gedung"];
        
    }
}
