<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Notifications\Notifiable;

class Gym extends Authenticatable implements TranslatableContract
{

    use HasFactory, Notifiable,Translatable;
    protected $guarded = [];
    public $translatedAttributes = ['name', 'description'];

    public function packages()
    {
        return $this->hasMany(PackageGym::class);
    }

    public function packagesGym()
    {
        return $this->belongsToMany(Package::class, 'package_gyms', 'gym_id', 'package_id')
            ->as('pivot');
    }

    public function images()
    {
        return $this->hasMany(GymImage::class);
    }
    public function times()
    {
        return $this->hasMany(GymTime::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'gym_id', 'id');
    }
    public function getUserRateAttribute()
    {
        return $this->reviews->where('user_id', auth('api')->user()->id)->first();
    }
    public function getAvgReviewsAttribute()
    {
        return (int) $this->reviews()->selectRaw('AVG(rating) review')->first()->review ?? 0;
    }

    public function Favourites()
    {
        return $this->belongsToMany(FavouriteGym::class);
    }
    public function getisUserFavouritesAttribute()
    {
        $isFavorite = false;

        if (auth('api')->user()) {
            $favouritbles =  FavouriteGym::where([
                ['user_id', '=', auth('api')->user()->id],
                ['gym_id', '=', $this->id]
            ])->get();
            if (count($favouritbles) > 0) {
                $isFavorite =  true;
            }
            return $isFavorite;
        }
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function getClientCountAttribute()
    {
        $gymPackagesIds = $this->packages()->pluck('id')->toArray();

        $userCount = User::whereHas('subscriptions', function ($query) use ($gymPackagesIds) {
            $query->whereIn('id', $gymPackagesIds);
        })->count();


        return $userCount;
    }
    // Gym.php
    public function getVisitPercentageAttribute()
    {
        $gymPackagesIds = $this->packages()->pluck('id')->toArray();

        $userCount = User::whereHas('subscriptions', function ($query) use ($gymPackagesIds) {
            $query->whereIn('id', $gymPackagesIds);
        })->count();

        $totalVisits = Visit::where('gym_id', $this->id)->count();

        if ($totalVisits > 0) {
            $percentage = ($userCount / $totalVisits) * 100;
            return round($percentage, 2);
        } else {
            return 0;
        }
    }
}
