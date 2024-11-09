<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lkpd extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_id',
        'instruction',
        'files',
        'prompt_ai',
        'xp',
        'criteria',
    ];

    /**
     * Get the content associated with the LKPD.
     */
    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function submissions()
    {
        return $this->hasMany(LkpdSubmission::class);
    }
}
