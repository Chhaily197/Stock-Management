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
        Schema::create('Books', function (Blueprint $table) {
            $table->id('book_id');
            $table->string("title");
            $table->decimal('price');
            $table->unsignedBigInteger('major_id')->index();
            $table->unsignedBigInteger('faculty_id')->index();
            $table->unsignedBigInteger('year_id')->index();
            $table->unsignedBigInteger('semester_id')->index();
            $table->string('Image');

            $table->foreign('semester_id')->references('semester_id')->on('semester')->onDelete('cascade');
            $table->foreign('major_id')->references('major_id')->on('majors')->onDelete('cascade');
            $table->foreign('faculty_id')->references('faculty_id')->on('faculties')->onDelete('cascade');
            $table->foreign('year_id')->references('year_id')->on('years')->onDelete('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Books');
    }
};
