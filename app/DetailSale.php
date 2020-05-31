<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailSale extends Model
{
    protected $fillable = [
        'sale_id','product_id','units','priceUnit','priceSale','discount',
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
