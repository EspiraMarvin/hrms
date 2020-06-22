<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{

    protected $table = "leaves";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
