<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LkpdSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'lkpd_id',
        'user_id',
        'answer',
        'assistant_feedback',
        'grade',
    ];

    /**
     * Get the LKPD associated with this submission.
     */
    public function lkpd()
    {
        return $this->belongsTo(Lkpd::class);
    }

    /**
     * Get the user who made this submission.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lkpdSubmissions()
    {
        return $this->hasMany(LkpdSubmission::class);
    }
}
