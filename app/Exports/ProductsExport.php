<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        return Product::select(['reference', 'name', 'description', 'price', 'quantity', 'status'])->get();
    }

    public function headings(): array
    {
        return [
            'reference',
            'name',
            'description',
            'price',
            'quantity',
            'status'
        ];
    }
}
