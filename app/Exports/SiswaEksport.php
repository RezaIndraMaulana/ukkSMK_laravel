<?php

namespace App\Exports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Http\Controllers\SiswaController;

class SiswaEksport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Siswa::select('nis', 'nama', 'alamat', 'no_telp')->get();
    }

    public function headings(): array{
        return["nis", "nama", "alamat", "no_telp"];
        
    }

}
