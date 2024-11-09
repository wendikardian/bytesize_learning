<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pathway extends Model
{
    use HasFactory;
    protected $table = 'pathways';

    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'image',
    ];
}

