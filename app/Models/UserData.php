<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Department;

class UserData extends Model
{
    use SoftDeletes;
    
    protected $table = 'user_data';

    protected $fillable = [
        'name',
        'email',
        'city',
        'age',
        'gender',
        'department_id'
    ];
    public function department()
{
    return $this->belongsTo(Department::class);
}
}