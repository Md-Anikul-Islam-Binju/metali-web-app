<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPostComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_post_id',
        'user_id',
        'comment',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(UserPostReplie::class, 'user_post_comment_id')->orderBy('created_at', 'asc');
    }
}
