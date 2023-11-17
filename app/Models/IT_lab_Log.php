<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IT_lab_Log extends Model
{
    use HasFactory;
    protected $table = 'lab_log';
    protected $fillable = [
        'user_id','item_id','in_and_out','qty','created_at'
    ];
    public function user_data(){
        return $this->belongsTo(user_data::class,'user_id');
    }
    public function it_lab_item(){
        return $this->belongsTo(it_lab_item::class,'item_id');
    }
}
