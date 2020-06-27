<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $fillable = [
        'title','subtitle','content','model','mainImage','URL',
    ];
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
