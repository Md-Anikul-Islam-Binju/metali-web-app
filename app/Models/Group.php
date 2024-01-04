<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'privacy_type',
        'short_description',
        'email',
        'phone',
        'address',
        'website_link',
        'cover_image',
        'is_verified',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function posts()
    {
        return $this->hasMany(GroupPost::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
    public function isLikedByUser($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }
}
