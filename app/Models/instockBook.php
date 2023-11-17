<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instockBook extends Model
{
    use HasFactory;
    protected $table = 'instocks';
    protected $primaryKey = 'instock_id';
     protected $fillable = [
        'book_id',
        'quantity'
    ];
    public function book(){
        return $this->belongsTo(BookModel::class);
    }
}
