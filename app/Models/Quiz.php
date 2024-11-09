<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Quiz extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public function registerMediaConversions(Media $media = null): void
    {
        // Define your media conversions here
    }

    public function registerMediaCollections(): void
    {
        // Define your media collections here
    }

    protected $fillable = ['content_id', 'desc', 'xp'];
    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function quizTaken()
    {
        return $this->hasMany(QuizTaken::class);
    }
}
