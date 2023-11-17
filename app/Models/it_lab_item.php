<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class it_lab_item extends Model
{
    use HasFactory;
    protected $primaryKey = 'item_id';
    protected $fillable= [
        'item_model_name',
        'brand_name',
        'item_description',
        'category_id',
        'qty_instocked',
        'unit_id',
        'qty_was_removed'
    ];
    public function IT_lab_Log(){
        return $this->hasMany(IT_lab_Log::class,'item_id');
    }
}
