<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Package extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    protected $guarded = [];
    public $translatedAttributes = ['name', 'description'];

    public function gyms()
    {
        return $this->belongsToMany(Package::class, 'package_gyms', 'gym_id', 'package_id')
            ->as('pivot');
    }

    public function gymssubcription()
    {
        return $this->belongsToMany(Gym::class, 'package_gyms', 'gym_id', 'package_id')
            ->as('pivot');
    }
}
