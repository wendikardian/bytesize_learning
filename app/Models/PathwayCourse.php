<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pathway;
use App\Models\Course;

class PathwayCourse extends Model
{
    use HasFactory;


    protected $table = 'pathway_courses';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'pathway_id',
        'course_id',
        'order',
        'description',
    ];

    /**
     * Define the relationship to the Pathway model.
     */
    public function pathway()
    {
        return $this->belongsTo(Pathway::class);
    }

    /**
     * Define the relationship to the Course model.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);

    }
}