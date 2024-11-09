<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCourse extends Model
{
    use HasFactory;
    protected $fillable = ['course_id', 'judul_sub', 'desc'];
    public function content()
    {
        return $this->hasMany(Content::class);
    }
}
