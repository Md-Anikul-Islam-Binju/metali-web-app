<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPostReplie extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_post_comment_id',
        'user_id',
        'reply',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Make sure to adjust the relationship name to match your actual Comment model
    public function comment()
    {
        return $this->belongsTo(UserPostComment::class, 'user_post_comment_id');
    }
}
