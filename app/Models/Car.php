<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $guarded = [];
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }

    public function seatType()
    {
        return $this->belongsTo(SeatType::class);
    }

    public function features()
    {
        return $this->belongsToMany(CarFeature::class, 'car_feature_car');
    }

    public function selectedFeatures()
    {
        return $this->features->pluck('id')->toArray();
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class)->with('user');
    }

    public function averageRating()
    {
        return $this->ratings()->avg('rating') ?: 0;
    }

    public function totalRatings()
    {
        return $this->ratings()->count();
    }

    public function reviewAnalysis()
    {
        //$ratingCounts = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
        $ratingCounts = [5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0];
        $totalRatings = $this->totalRatings();

        // Count the ratings for each star level
        foreach ($this->ratings as $rating) {
            $ratingCounts[$rating->rating]++;
        }

        // Calculate percentage for each star level
        $analysis = [];
        foreach ($ratingCounts as $stars => $count) {
            $percentage = $totalRatings > 0 ? round(($count / $totalRatings) * 100) : 0;
            $analysis[$stars] = [
                'count' => $count,
                'percentage' => $percentage,
            ];
        }

        return $analysis;
    }

        public function userHasReviewed()
        {
            if (!auth()->check()) {
                return false; // User is not authenticated
            }

            return $this->ratings()->where('user_id', auth()->id())->exists();
        }

    public function leases()
    {
        return $this->hasMany(Lease::class, 'car_id');
    }

    public function booked()
    {
        return $this->leases()->where('end_date', '>', now())->where('status', 1)->exists();
    }

    public function isAvailable()
    {
        return !$this->leases()->where('end_date', '>', now())->where('status', Lease::STATUS_CONFIRMED)->exists();
    }


    public function getPriceAttribute($value)
    {
        return number_format($value, 2, '.', '');
    }

    public function getFormatedPriceAttribute()
    {
        return '₦' . ($this->price ? number_format($this->price, 2) : '0.00');
    }

    public function getImageUrlAttribute()
    {
        $images = json_decode($this->images);
        return isset($images[0]) ? asset('storage/' . $images[0]) : null;
    }



}
