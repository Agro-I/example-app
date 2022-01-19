<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function releases()
    {
        return $this->hasMany(GrandTourRelease::class);
    }

    public function followed()
    {
        return $this->belongsToMany(User::class, 'followers_users', 'user_id', 'follower_id');
    }

    public function addFollower(User $user)
    {
        $this->followed()->attach($user->id);
    }

    public function removeFollower(User $user)
    {
        $this->followed()->detach($user->id);
    }
}
