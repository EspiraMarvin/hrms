<?php

namespace App;

use App\Employee;
use Illuminate\Database\Eloquent\Model;

class Promote extends Model
{
    protected $table = 'promotions';
     /*  protected $fillable = [
      'name', 'role', 'salary','promotion_date'
     ];*/

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function role()
    {
//        return $this->hasMany(Role::class);
        return $this->hasMany('App\Role', 'id', 'role_id');
    }

    public function userrole()
    {
//        return $this->hasOne(Role::class);
//        return $this->hasMany(UserRole::class);
        return $this->hasMany('App\UserRole','id','employee_id');
    }
}
