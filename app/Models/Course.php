<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_name',
        'department',
        'level',
        'CourseSchool'
    ];
    public function campuses()
    {
        return $this->belongsToMany(Campus::class, 'campus_courses');
    }
    public function inquiries()
    {
        return $this->belongsTo(inquiries::class);
    }
}
