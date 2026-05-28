<?php

namespace App\Imports;

use App\Models\UserData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserDataImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new UserData([
            'name'   => $row['name'],
            'email'  => $row['email'],
            'city'   => $row['city'],
            'age'    => $row['age'],
            'gender' => $row['gender'],
        ]);
    }
}