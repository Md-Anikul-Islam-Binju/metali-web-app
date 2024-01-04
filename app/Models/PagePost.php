<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagePost extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_id',
        'user_id',
        'post_content',
        'post_image',
        'post_video',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(PagePostComment::class, 'page_post_id')->orderBy('created_at', 'asc');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function isLikedByUser($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }

    public function countComments()
    {
        return $this->comments()->count();
    }

    public function countLikes()
    {
        return $this->likes()->count();
    }
}
