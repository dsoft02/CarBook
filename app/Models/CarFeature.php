<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarFeature extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cars()
    {
        return $this->belongsToMany(Car::class, 'car_feature_car');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
