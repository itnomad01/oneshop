<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255); // название
            $table->unsignedDecimal('price', 14, 2)->nullable(); // цена
            $table->foreignId('category_id') // категория
                ->nullable()
                ->constrained('categories')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('picture_id') // картинка
                ->nullable()
                ->constrained('mediafiles')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('user_id') //author
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
