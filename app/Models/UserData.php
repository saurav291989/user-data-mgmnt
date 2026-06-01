<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserData extends Model
{
    use SoftDeletes;
    
    protected $table = 'user_data';

    protected $fillable = [
        'name',
        'email',
        'city',
        'age',
        'gender'
    ];
}