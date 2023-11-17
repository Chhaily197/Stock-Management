<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('it_lab_items', function (Blueprint $table) {
                $table->id('item_id');
                $table->string('item_code');
                $table->string('item_model_name');
                $table->string('brand_name');
                $table->string('item_description');
                $table->string('user_id');
                $table->integer('category_id');
                $table->integer('qty_instocked');
                $table->integer('unit_id');
                $table->integer('qty_was_removed');
                $table->integer('qty_all');
                $table->double('unit_price');
                $table->text('image_url');
                $table->timestamps();
            });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('it_lab_items');
    }
};
