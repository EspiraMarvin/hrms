<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
//    protected $guarded = [];
    protected $fillable = array('role_id','employee_id');

    public function role()
    {
//        return $this->hasOne(Role::class);
        return $this->hasOne('App\Role', 'id', 'role_id');
    }
}
