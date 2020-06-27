<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'brand_id','category_id','name','model','SKU','principalImage','stock',
        'standardPrice','currentPrice','offerPrice',
        'expirationOfferPrice','description','qualification','URL',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
