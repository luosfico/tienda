<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'name','ordinal',
    ];

    public function communes(){
        return $this->hasMany(Commune::class);
    }
}
