<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_details',
        'image',
        'videos',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(UserPostComment::class, 'user_post_id')->orderBy('created_at', 'asc');
    }


    public function timelinePostLikes()
    {
        return $this->hasMany(TimelinePostLike::class, 'user_post_id');
    }

    // Define the isLikedByUser method
    public function isLikedByUser($userId)
    {
        return $this->timelinePostLikes()->where('user_id', $userId)->exists();
    }

    public function countLikes()
    {
        return $this->timelinePostLikes()->count();
    }

    public function countComments()
    {
        return $this->comments()->count();
    }

}
