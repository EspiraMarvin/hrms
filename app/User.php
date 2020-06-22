<?php

namespace App;

use App\UserRole;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'date_of_birth',
    ];

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function leaves()
    {
        return $this->belongsToMany(ApplyLeave::class,'apply_leaves','user_id');
    }

    public function targets()
    {
        return $this->belongsToMany(Target::class, 'targets','user_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role','user_id','role_id');
    }

    public function supervisor()
    {
        return $this->belongsToMany(User::class,'supervisor_user','supervisor_id','user_id');
    }

    public function supervisedBy()
    {
        return $this->belongsToMany(User::class,'supervisor_user','user_id','supervisor_id');
    }


    public function isAdmin()
    {
        //manager, HR and administration
        $admin = false;
        foreach ($this->roles as $role)
        {
            if ($role->id === 3){
                $admin = true;
            }
        }
        return $admin;

    }

    public function isHR()
    {
        $hr = false;
        foreach ($this->roles as $role) {
            if($role->id == 4){
                return true;
            }
        }
        return $hr;
    }

    public function isSupervisor()
    {
        $supervisor = false;
        foreach ($this->roles as $role)
        {
            if ($role->id == 2){
                $supervisor = true;
            }
        }
        return $supervisor;
    }

    public function leaveApprove()
    {
        $approve= ApplyLeave::whereHas('user', function ($q) {
            $q->whereHas('supervisedBy', function ($qq){
                $qq->where('supervisor_id',Auth::user()->id);
            });
        })->with('user')->orderBy('id','desc')->paginate(10);

       if(count($approve) > 0)
        {
            return true;
        }
        return false;
    }
}
