<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_name'
    ];
    public function campuses()
    {
        return $this->belongsToMany(Campus::class, 'campus_courses');
    }
}
