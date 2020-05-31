<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarouselHome extends Model
{
    protected $fillable = [
        'position', 'imageFull', 'imageMobile', 'visible', 'URL',
    ];
}
