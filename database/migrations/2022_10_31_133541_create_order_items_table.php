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
        Schema::create('order_items', function (Blueprint $table)
         {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('product');
            $table->foreignId('amazing_sale_id')->constrained('amazing_sales')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('amazing_sale_object');
            $table->decimal('amazing_sale_discount_amount', 20,3);
            $table->integer('number')->default(1);
            $table->decimal('final_product_price', 20,3);
            $table->decimal('final_total_price', 20,3);
            $table->foreignId('color_id')->nullable()->constrained('product_colors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('guarantiy_id')->nullable()->constrained('guarantees')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('order_items');
    }
};
