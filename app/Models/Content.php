<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Loader\EvalLoader;

class Content extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'sub_course_id',
        'judul',
        'tipe_content',
        'prev_id',
        'next_id',
    ];
    public function subCourse()
    {
        return $this->belongsTo(SubCourse::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function material()
    {
        return $this->hasOne(Material::class);
    }

    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }

    public function evaluation()
    {
        return $this->hasOne(Evaluation::class);
    }

    public function detailLearning()
    {
        return $this->hasMany(DetailLearning::class);
    }
    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

    public function lkpd()
    {
        return $this->hasOne(Lkpd::class);
    }
}

