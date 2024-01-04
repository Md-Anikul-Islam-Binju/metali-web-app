<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimelinePostLike extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_post_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userPost()
    {
        return $this->belongsTo(UserPost::class, 'user_post_id');
    }
}
