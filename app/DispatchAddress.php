<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DispatchAddress extends Model
{
    protected $fillable = [
        'user_id','name','address','nameContact','phoneContact','observation',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
