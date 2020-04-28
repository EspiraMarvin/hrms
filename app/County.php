<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $table = "counties";

    public function asset(){
        return $this->hasMany(Asset::class);
    }

    public function expense(){
        return $this->hasMany(Expense::class);
    }

   public function region(){
        return $this->belongsTo(Region::class);
    }
}
