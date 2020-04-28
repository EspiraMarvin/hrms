<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table = "assets";

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function regions(){
        return $this->hasMany(Region::class);
    }

    public function counties(){
        return $this->hasMany(County::class);
    }

}
