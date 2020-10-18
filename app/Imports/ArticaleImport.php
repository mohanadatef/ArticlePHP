<?php

namespace App\Imports;

use App\Articale;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;


class ArticaleImport implements ToModel,WithValidation,WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Articale([
            'tittle'     => $row['tittle'],
            'body'       => $row['body'],
            'user_id'      => $row['user_id' ],
            'image'      => $row['image'],
        ]);
    }
    public function rules(): array
    {
        return [
            'tittle' => 'required',
            'body' => 'required',
            'user_id'  => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ];
    }
}