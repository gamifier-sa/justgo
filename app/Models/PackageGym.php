<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageGym extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class,'package_id','id');
    }

}
