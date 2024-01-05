<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = [
        'message_sender_id',
        'message_receiver_id',
        'message',
        'file',
        'image',
        'status',
    ];
}
