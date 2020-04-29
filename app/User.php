<?php

namespace App;

use App\UserRole;
use App\ApplyLeave;
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

    public function userrole()
    {
        return $this->hasOne('App\UserRole', 'employee_id', 'id');
    }

    public function isAdmin()
    {
        $employeeId = Auth::user()->id;
        $userRole = UserRole::where('employee_id', $employeeId)->first();
        if($userRole && $userRole->role_id == 1)
        {

            return true;
        }
            return false;

    }

    public function leaveApprove()
    {
        $leave = ApplyLeave::all();
        if(count($leave) > 0)
        {
            return true;
        }
        return false;
    }
}
