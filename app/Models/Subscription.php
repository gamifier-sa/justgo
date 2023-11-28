<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function users()
    {
        return $this->hasMany(User::class,'id','user_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class,'package_id','id');
    }
}
