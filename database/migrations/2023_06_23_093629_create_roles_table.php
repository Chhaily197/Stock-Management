<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id('role_id');
            $table->string('role_name');
            $table->string('role_description');
            $table->timestamps();
        });
        DB::table('roles')->insert([
            [
                'role_name' => 'Admin',
                'role_description' => 'Admin control all system', // Replace with actual hashed password
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_name' => 'Bookshop',
                'role_description' => 'selling book', // Replace with actual hashed password
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_name' => 'IT_LAB',
                'role_description' => 'stock IT lab ', // Replace with actual hashed password
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more data arrays for additional rows
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
