<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->char('reference', 5)->unique();
            $table->string('name');
            $table->string('description');
            $table->integer('price');
            $table->boolean('status')->default(true);
            $table->unsignedInteger('quantity');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
