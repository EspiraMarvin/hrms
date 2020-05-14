<?php

namespace App;

use App\ApplyLeave;
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

    public function employee()
    {
        return $this->hasOne(Employee::class);
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
        $admin = false;
        foreach ($this->roles as $role)
        {
            if ($role->id == 1){
                $admin = true;
            }
        }
        return $admin;

    }

    public function isSupervisor()
    {
        $supervisor = false;
        foreach ($this->roles as $role)
        {
            if ($role->id == 9){
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
