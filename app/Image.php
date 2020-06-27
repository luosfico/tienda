<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'name','relation','product_id','newsletter_id',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function newsletter()
    {
        return $this->belongsTo(Newsletter::class);
    }

}
