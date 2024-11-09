<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Evaluation extends Model implements hasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    
    protected $fillable = ['content_id', 'xp', 'studi_kasus', 'step'];

    public function registerMediaConversions(Media $media = null): void
    {
        // Define your media conversions here
    }

    public function registerMediaCollections(): void
    {
        // Define your media collections here
    }


    public function content()
    {
        return $this->belongsTo(Content::class);
    }
    public function rubrik()
    {
        return $this->hasMany(Rubrik::class);
    }

    public function evalationTaken()
    {
        return $this->hasMany(EvaluationTaken::class);
    }
}
