<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithUpserts;

class UsersImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $password = Hash::make(Str::random(8));
        return new User([
            'name'  => $row['name'],
            'email' => $row['email'],
            'password' => $password,
        ]);
    }

    public function uniqueBy()
    {
        return 'email';
    }
}
