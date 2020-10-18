<?php

namespace App\Imports;

use App\City;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class CityImport implements ToModel,WithValidation,WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new City([
            'name_ar'     => $row['name_ar'],
            'name_en'       => $row['name_en'],
            'country_id'       => $row['country_id'],
        ]);
    }
    public function rules(): array
    {
        return [
            'name_ar' => 'required',
            'name_en' => 'required',
            'country_id' => 'required',
        ];
    }
}
