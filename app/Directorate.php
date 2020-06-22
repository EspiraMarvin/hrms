<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directorate extends Model
{
    protected $table = "directorates";
//    public $timestamps = false;
    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}
