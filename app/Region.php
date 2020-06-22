<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = "regions";

    public function asset()
    {
        return $this->hasManyThrough(Asset::class,County::class);
    }

    public function expense()
    {
        return $this->hasManyThrough(Expense::class,County::class);
    }

    public function counties()
    {
        return $this->hasMany(County::class);
    }
}
