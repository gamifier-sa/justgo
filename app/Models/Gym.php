<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Gym extends Model implements TranslatableContract
{

    use HasFactory,Translatable;
    protected $guarded = [];
    public $translatedAttributes = ['name','description'];
}
