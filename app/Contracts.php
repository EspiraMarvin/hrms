<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
    protected $table = 'contracts';

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
