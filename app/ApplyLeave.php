<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplyLeave extends Model
{
    protected $table = "apply_leaves";


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function leaves()
    {
        return $this->belongsTo(Leave::class,'leave_type_id');

    }



}
