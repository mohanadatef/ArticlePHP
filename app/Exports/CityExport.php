<?php

namespace App\Exports;

use App\City;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CityExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return  City::all(['name_en','name_ar','country_id']);
    }
    public function headings(): array
    {
        return ['name_en','name_ar','country_id'];
    }
}
