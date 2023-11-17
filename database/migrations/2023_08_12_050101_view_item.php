<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
        CREATE VIEW lab_item_view 
        AS
        SELECT
        it_lab_items.*,
        brands.brand_name as brands,
        itlab_categories.category_name,
        units.unit,
        user_datas.username
    FROM
        it_lab_items
    JOIN
        brands ON it_lab_items.brand_name = brands.brand_id
    JOIN
        itlab_categories ON it_lab_items.category_id = itlab_categories.category_id
    JOIN
        units ON it_lab_items.unit_id = units.unit_id
    JOIN
        user_datas ON it_lab_items.user_id = user_datas.user_id;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }

};