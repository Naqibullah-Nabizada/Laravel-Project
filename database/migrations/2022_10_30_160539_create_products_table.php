<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->text('introduction');
            $table->string('slug')->unique()->nullable();
            $table->text('image');
            $table->decimal('weight', 12, 2);
            $table->decimal('length', 12, 1);
            $table->decimal('width', 12, 1);
            $table->decimal('height', 12, 1);
            $table->decimal('price', 20, 3);
            $table->tinyInteger('status')->default(0);
            $table->integer('marketable')->default(1);
            $table->string('tags');
            $table->integer('sold_number')->default(0);
            $table->integer('frozen_number')->default(0);
            $table->integer('marketable_number')->default(0);
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('category_id')->constrained('product_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('published_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_products');
    }
};
