<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithHeadingRow,WithValidation
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'     => $row['name'],
            'code'     => $row['code'],
            'email'    => $row['email'],
            'country_id'    => $row['country'],
            'city_id'    => $row['city'],
            'password' => Hash::make('123456'),
        ]);
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'code' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'city_id' => 'required',
            'country_id' => 'required',
        ];
    }
}
