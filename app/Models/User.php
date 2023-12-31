<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\PasswordCodeResetNotification;
use App\Services\Classes\UserConfirmation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, UserConfirmation;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'profile_image',
        'email',
        'phone',
        'whatsapp_number',
        'gender',
        'status',
        'password'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordCodeResetNotification($token));
    }
    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
