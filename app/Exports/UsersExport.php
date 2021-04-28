<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all(['firstname','lastname','name','email','gender','phone_no']);
    }
    public function headings(): array
    {
        return [
            '#',
            'First Name',
            'Last Name',
            'User Name ',
            'Email Address',
            'Gender',
            'Phone No'
        ];
    }
}
