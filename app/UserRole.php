<?php
/*
namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
//    protected $guarded = [];
    protected $table = 'user_role';
//    protected $fillable = array('role_id','user_id');

    public function user()
    {
//        return $this->belongsTo(User::class);
        return $this->belongsToMany(User::class,'user_role','role_id','user_id');

    }

}*/
