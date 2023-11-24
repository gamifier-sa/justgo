<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavouriteGym extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function gyms()
    {
        return $this->hasMany(Gym::class,'id','gym_id');
    }

}
