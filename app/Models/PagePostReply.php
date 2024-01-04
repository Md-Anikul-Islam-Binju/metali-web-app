<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagePostReply extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_post_comment_id',
        'user_id',
        'reply',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
