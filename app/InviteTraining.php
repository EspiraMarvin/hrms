<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InviteTraining extends Model
{
    protected $table = "invite_trainings";

    public function employee()
    {
        return $this->belongsTo(User::class);
    }

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}

