<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailQuizTaken extends Model
{
    protected $guarded = [
        'id'
    ];

    public function quizTaken()
    {
        return $this->belongsTo(QuizTaken::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
