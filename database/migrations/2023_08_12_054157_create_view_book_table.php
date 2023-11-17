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
        DB::statement("
CREATE VIEW books_info AS
SELECT
    b.book_id AS book_id,
    b.title,
    b.price,
    m.major_name AS Majors,
    f.faculty_name AS Faculty,
    y.year_name AS Years,
    s.semester_name AS Semester,
    i.quantity AS Quantity,
    b.Image
FROM
    books b
LEFT JOIN majors m ON b.major_id = m.major_id
LEFT JOIN faculties f ON b.faculty_id = f.faculty_id
LEFT JOIN years y ON b.year_id = y.year_id
LEFT JOIN semester s ON b.semester_id = s.semester_id
LEFT JOIN instocks i ON b.book_id = i.book_id;

            ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
