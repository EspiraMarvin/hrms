<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AwardAssign extends Model
{

    protected $table = "award_assigns";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function award()
    {
        return $this->belongsTo(Award::class);
    }

}
