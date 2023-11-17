<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outstockBook extends Model
{
    use HasFactory;
    protected $table = 'outstocks';

    protected $fillable = ['customer_id','book_id','quantity'];

    public function book(){
        return $this->belongsTo(BookModel::class);
    }
}
