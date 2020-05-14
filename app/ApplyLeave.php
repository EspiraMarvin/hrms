<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplyLeave extends Model
{
    protected $table = "apply_leaves";


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function leaves()
    {
        return $this->belongsTo(Leave::class,'leave_type_id');

    }



}
