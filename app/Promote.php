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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role','user_id','role_id');
    }



}
