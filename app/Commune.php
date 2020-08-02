<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $fillable = [
        'name','region_id',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
