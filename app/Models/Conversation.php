<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content_id',
        'sender',
        'message',
        'conversation_order',
        'timestamp',
    ];

    /**
     * Get the user associated with the conversation.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the content associated with the conversation.
     */
    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
