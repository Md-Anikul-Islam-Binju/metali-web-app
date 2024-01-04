<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupPostReply extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'group_post_comment_id',
            'user_id',
            'reply'
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
