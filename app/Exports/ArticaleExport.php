<?php

namespace App\Exports;

use App\Articale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ArticaleExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return  Articale::all(['tittle','body','user_id','image']);
    }
    public function headings(): array
    {
        return ['tittle', 'body', 'user_id','image'];
    }
}
