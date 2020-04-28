<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = "expenses";

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function county(){
        return $this->belongsTo(County::class);
    }
}
