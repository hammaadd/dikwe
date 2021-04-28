<?php

namespace App\Exports;

use App\Models\Subscriber;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubscribersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Subscriber::where('status','1')->get(['id','email','created_at']);
    }
    public function headings(): array
    {
        return [
            '#',
            'Email',
            'Date',
        ];
    }

}
