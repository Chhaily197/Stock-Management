<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleBook extends Model
{
    use HasFactory;
    protected $table = 'salebooks';
    protected $fillable = ['book_id','Title','quantity','price','amount'];

    protected $primaryKey = 'sale_id';
}
