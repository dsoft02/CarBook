<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function carModels()
    {
        return $this->hasMany(CarModel::class);
    }

    public function getTotalModelsAttribute()
    {
        return $this->carModels()->count();
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function getTotalCarsAttribute()
    {
        return $this->cars()->count();
    }
}
