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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('subject')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('seen')->default(0);
            $table->foreignId('reference_id')->constrained('ticket_admins')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('category_id')->constrained('ticket_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('priority_id')->constrained('ticket_priorities')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('ticket_id')->nullable()->constrained('tickets')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tickets');
    }
};
