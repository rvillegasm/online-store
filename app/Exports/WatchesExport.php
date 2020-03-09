<?php

namespace App\Exports;

use App\Watch;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class WatchesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Watch::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'quantity',
            'color',
            'brand',
            'reference',
            'gender',
            'price',
            'image',
            'description',
            'category_id',
        ];
    }
}
