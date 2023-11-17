<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_library extends Model
{
    use HasFactory;
    protected $fillable= [
        'title',
        'author',
        'quantity',
        'image',
        'description',
    ];

    public function borrow(){
        return $this->hasMany(borrowBook::class);
    }
}
