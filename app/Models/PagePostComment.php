<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagePostComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_post_id',
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
        return $this->hasMany(PagePostReply::class, 'page_post_comment_id')->orderBy('created_at', 'asc');
    }
}
