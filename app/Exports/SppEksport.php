<?php

namespace App\Exports;

use App\Spp;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Http\Controllers\SppController;

class SppEksport implements FromCollection, WithHeadings
{
   /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Spp::select('id', 'tahun', 'nominal')->get();
    }

    public function headings(): array{
        return["id", "tahun", "nominal"];
        
    }
}
