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
        Schema::create('user_datas', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('username');
            $table->string('gender');
            $table->string('gmail');
            $table->string('password');
            $table->integer('role_id');
            $table->timestamps();
        });
        DB::table('user_datas')->insert([
            [
                'username' => 'Admin',
                'gender' => 'M', 
                'gmail' => 'lyher750@gmail.com', 
                'password' => 'lyher245', 
                'role_id' => '1', 
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
        //
    }
};
