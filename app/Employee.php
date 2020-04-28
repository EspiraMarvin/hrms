<?php

namespace App;

//use Illuminate\Foundation\Auth\User as Authenicaticable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Employee extends Model
{

    protected $table = "employees";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role()
    {
        return $this->hasOne(Role::class);
    }

    public function userrole()
    {
        return $this->hasOne(UserRole::class);
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

    public function Promote()
    {
        return $this->hasMany(Promote ::class);
    }

}
