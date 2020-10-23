<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'car_id'
    ];

    public function car()
    {
        return $this->belongsTo('App\Models\Car');
    }
}
