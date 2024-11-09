<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Question extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'quiz_id',
        'pertanyaan',
        'prev_quest',
        'next_quest',
        'point',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        // Define your media conversions here
    }

    public function registerMediaCollections(): void
    {
        // Define your media collections here
    }
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }

    public function detailQuizTaken()
    {
        return $this->hasMany(DetailQuizTaken::class);
    }
}
