<?php

namespace App\Imports;

use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Actions\ImportProductAction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\Importable;

class ProductsImport implements ToCollection, WithHeadingRow
{
    use SkipsErrors, Importable;
    protected Int $user;
    protected ImportProductAction $importAction;

    public function __construct(int $user, ImportProductAction $importAction)
    {
        $this->user = $user;
        $this->importAction = $importAction;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $product = Product::where('reference', $row['reference'])->first();

            $this->importAction->execute([
                'user_id' => $this->user,
                'reference' => $row['reference'],
                'name' => $row['name'],
                'description' => $row['description'],
                'price' => $row['price'],
                'quantity' => $row['quantity'],
                'status' => $row['status'],
            ], $product);
        }
    }

    /*public function rules(): array
    {
        return [
            '*.name' => ['required', 'min:5', 'max:100'],
            '*.description' => ['required', 'min:10', 'max:250'],
            '*.price' => ['required', 'integer', 'min:1'],
            '*.quantity' => ['required', 'integer', 'min:0'],
        ];
    }*/
}
