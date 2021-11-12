<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    use HasFactory;

    protected $fillable = [
        'min_price',
        'max_price',
        'smokers_ok',
        'pets_ok',
        'min_age',
        'max_age',
        'preferred_gender',
        'location',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function isMatchable() {
        return 
            $this->min_price !== null && 
            $this->max_price !== null && 
            $this->smokers_ok !== null && 
            $this->pets_ok !== null && 
            $this->min_age !== null && 
            $this->max_age !== null;
    }

    public function scopeSimilarTo($query, $preference) {
        $query
            ->where('min_price', '>=', $preference->min_price * 0.8)
            ->where('min_price', '<=', $preference->min_price * 1.2)
            ->where('max_price', '>=', $preference->max_price * 0.8)
            ->where('max_price', '<=', $preference->max_price * 1.2)
            ->where('smokers_ok', $preference->smokers_ok)
            ->where('pets_ok', $preference->pets_ok)
            ->where('min_age', '>=', $preference->min_age)
            ->where('max_age', '<=', $preference->max_age)
            ->where('user_id', '!=', $preference->user_id)
            ->where('location', $preference->location);
            
    }
}
