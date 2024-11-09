<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizTaken extends Model
{
    protected $guarded = [
        'id'
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function detailQuizTaken()
    {
        return $this->hasMany(DetailQuizTaken::class);
    }

    public function detailLearning()
    {
        return $this->belongsTo(DetailLearning::class);
    }
}
