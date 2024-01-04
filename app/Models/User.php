<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'gender',
        'birthday',
        'address',
        'relation_status',
        'cover_photo',
        'profile_photo',
        'short_bio',
        'political_status',
        'religion',
        'role',
        'password',
        'status',
    ];

    public function sentFriendRequests()
    {
        return $this->hasMany(FriendRequests::class, 'sender_id');
    }

    public function receivedFriendRequests()
    {
        return $this->hasMany(FriendRequests::class, 'receiver_id');
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id');
    }

    public function userPost()
    {
        return $this->hasMany(UserPost::class);
    }

    public function educations(): HasMany
    {
        return $this->hasMany(Education::class, 'user_id');
    }

    public function designations(): HasMany
    {
        return $this->hasMany(Designation::class, 'user_id');
    }

    public function links(): HasMany
    {
        return $this->hasMany(SocialLink::class, 'user_id');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
