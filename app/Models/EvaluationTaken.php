<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationTaken extends Model
{
    protected $guarded = [
        'id'
    ];

    public function detailLearning()
    {
        return $this->belongsTo(DetailLearning::class);
    }

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }
}
