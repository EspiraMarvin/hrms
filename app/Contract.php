<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contracts';

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
