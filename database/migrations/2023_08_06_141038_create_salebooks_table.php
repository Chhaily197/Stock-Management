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
        Schema::create('salebooks', function (Blueprint $table) {
            $table->id('sale_id');
            $table->unsignedBigInteger('book_id')->index();
            $table->string('Title');
            $table->integer('quantity');
            $table->string('price');
            $table->string('amount');

            $table->foreign('book_id')->references('book_id')->on('Books')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salebooks');
    }
};
