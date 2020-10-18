<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return  User::all([ 'id','name','code','emails','country_id','city_id',]);
    }
    public function headings(): array
    {
        return ['#', 'Name', 'code', 'emails','country_id','city_id',];
    }
}
