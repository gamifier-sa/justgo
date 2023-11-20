<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Gym extends Authenticatable implements TranslatableContract
{

    use HasApiTokens, HasFactory, Notifiable,Translatable;
    protected $guarded = [];
    public $translatedAttributes = ['about_us','privacy_policy'];
}
