<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_data extends Model
{
    use HasFactory;
    protected $primaryKey = 'user_id';
    protected $table = 'user_datas';
    // protected $fillable = array('username','gender', 'gmail', 'password','role_id');

}
