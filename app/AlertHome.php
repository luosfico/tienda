<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlertHome extends Model
{
    protected $fillable = [
        'type','icon','message','image',
    ];
}
