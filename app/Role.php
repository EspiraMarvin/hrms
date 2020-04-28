<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";

    public function employee()
    {
        return $this->belongsTo(Employee::class);

    }
}
