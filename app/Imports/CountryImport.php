<?php
namespace App\Imports;
use App\Country;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
class CountryImport implements ToModel,WithValidation,WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Country([
            'name_ar'     => $row['name_ar'],
            'name_en'       => $row['name_en'],
        ]);
    }
    public function rules(): array
    {
        return [
            'name_ar' => 'required|unique:countries',
            'name_en' => 'required|unique:countries',
        ];
    }
}