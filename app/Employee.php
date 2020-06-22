<?php

namespace App;

//use Illuminate\Foundation\Auth\User as Authenicaticable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Employee extends Model
{

    protected $table = "employees";

    protected $fillable = [
        'department_id','code', 'pf_number', 'name','photo','code','pf_number','status','gender',
        'kra_pin','duty_station','employment_type','salary','account_number','bank_name','user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role','user_id','role_id');
    }

    public function targets()
    {
        return $this->hasMany(Target::class);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

    public function ApplyLeave()
    {
        return $this->hasMany(ApplyLeave::class);
    }

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }

    public function AssetAssign()
    {
        return $this->hasMany(AssetAssign ::class);
    }

    public function awards()
    {
        return $this->hasMany(Award ::class);
    }

    public function AwardAssign()
    {
        return $this->hasMany(Award ::class);
    }

    public function training()
    {
        return $this->hasMany(Training ::class);
    }

    public function invitetraining()
    {
        return $this->hasMany(InviteTraining ::class);
    }

}
