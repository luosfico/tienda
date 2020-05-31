<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'brand_id','category_id','name','model','SKU','standardPrice','currentPrice','offerPrice',
        'expirationOfferPrice','stock','description','qualification','URL',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
