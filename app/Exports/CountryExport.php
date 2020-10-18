<?php

namespace App\Exports;

use App\Country;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CountryExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return  Country::all(['name_en','name_ar',]);
    }
    public function headings(): array
    {
        return ['name_en','name_ar',];
    }
}
