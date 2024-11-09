<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailLearning extends Model
{
    //use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function learning()
    {
        return $this->belongsTo(Learning::class);
    }

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function quizTaken()
    {
        return $this->hasOne(QuizTaken::class);
    }

    public function evaluationTaken()
    {
        return $this->hasOne(EvaluationTaken::class);
    }
}
