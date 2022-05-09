<?php

namespace App\Imports;

use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Actions\StoreProductImagesAction;
use App\Actions\UpdateProductAction;

class ProductsImport implements ToCollection, WithHeadingRow
{
    protected Int $user;
    protected StoreProductImagesAction $imagesAction;
    protected UpdateProductAction $updateAction;

    public function __construct(int $user, UpdateProductAction $updateAction, StoreProductImagesAction $imagesAction)
    {
        $this->user = $user;
        $this->updateAction = $updateAction;
        $this->imagesAction = $imagesAction;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $product = Product::where('reference', $row['reference'])->first();
            if ($product) {
                $this->updateAction->execute([
                    'user_id' => $this->user,
                    'reference' => $row['reference'],
                    'name' => $row['name'],
                    'description' => $row['description'],
                    'price' => $row['price'],
                    'quantity' => $row['quantity'],
                    'status' => $row['status'],
                ], $product, $this->imagesAction);
            } else {
                $this->updateAction->execute([
                    'user_id' => $this->user,
                    'reference' => $row['reference'],
                    'name' => $row['name'],
                    'description' => $row['description'],
                    'price' => $row['price'],
                    'quantity' => $row['quantity'],
                    'status' => $row['status']
                ], $product, $this->imagesAction);
            }
        }
    }
}
