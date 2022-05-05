<?php

namespace App\Imports;

use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    protected Int $user;

    public function __construct(int $user)
    {
        $this->user = $user;
    }

    public function model(array $row): model
    {
        return new Product([
            'user_id' => $this->user,
            'reference' => $row['reference'],
            'name' => $row['name'],
            'description' => $row['description'],
            'price' => $row['price'],
            'quantity' => $row['quantity'],
            'status' => $row['status']
        ]);
    }
}
