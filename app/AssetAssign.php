<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetAssign extends Model
{
    protected $table = "asset_assigns";

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function county()
    {
        return $this->belongsTo(County::class);
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }


}


