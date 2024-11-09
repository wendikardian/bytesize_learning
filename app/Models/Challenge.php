<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Challenge extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;



    protected $fillable = [
        'judul',
        'deskripsi',
        'isi',
        'step',
        'point',
        'xp'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        // Define your media conversions here
    }

    public function registerMediaCollections(): void
    {
        // Define your media collections here
    }

    public function challengeTaken()
    {
        return $this->hasMany(ChallengeTaken::class);
    }
}
