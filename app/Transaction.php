<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'sale_id','paymentMethod','typePay','codeAuthorization','dateAuthorization','amount','NumberCard',
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
