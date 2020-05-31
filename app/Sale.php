<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'user_id','codeSale','totalSale','state','descriptionState',
    ];

    public function detailsale()
    {
        $this->hasMany(DetailSale::class);
    }
}
