<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $primaryKey = "book_id";
    protected $fillable = [
        'title',
        'price',
        'major_id',
        'faculty_id',
        'year_id',
        'semester_id',
        'Image'
    ];
    public function instockBook(){
        return $this->hasMany(instockBook::class);
    }
}
