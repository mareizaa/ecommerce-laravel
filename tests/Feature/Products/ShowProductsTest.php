<?php

namespace Tests\Feature\Products;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\User;

class ShowProductsTest extends TestCase
{
    use RefreshDatabase;

    public function testShowCanViewProducts()
    {
        $user = User::factory()->create();
        $product = Product::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->get("/products/{$product->id}");

        $response->assertSee($product->name);
    }
}
