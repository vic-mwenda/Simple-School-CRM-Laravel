<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Campus;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $courses = [
            [
                'name' => 'Course 1',
                'campuses' => ['Campus 1', 'Campus 2'],
                'department'=>'CIT',
                'level'=>'diploma'
            ],
            [
                'name' => 'Course 2',
                'campuses' => ['Campus 2', 'Campus 3'],
                'department'=>'CIT',
                'level'=>'diploma'
            ],
            [
                'name' => 'Course 3',
                'campuses' => ['Campus 1', 'Campus 3'],
                'department'=>'CIT',
                'level'=>'diploma'
            ],
            [
                'name' => 'Course 4',
                'campuses' => ['Campus 2', 'Campus 3'],
                'department'=>'CIT',
                'level'=>'diploma'
            ],
            [
                'name' => 'Course 5',
                'campuses' => ['Campus 2', 'Campus 1'],
                'department'=>'CIT',
                'level'=>'certificate'
            ],
            [
                'name' => 'Course 6',
                'campuses' => ['Campus 2', 'Campus 3'],
                'department'=>'CIT',
                'level'=>'degree'
            ],
        ];

        foreach ($courses as $courseData) {
            $course = Course::create([
                'course_name' => $courseData['name'],
                'department'=>$courseData['department'],
                'level'=>$courseData['level']
            ]);

            foreach ($courseData['campuses'] as $campusName) {
                $campus = Campus::where('name', $campusName)->first();
                if ($campus) {
                    $course->campuses()->attach($campus->id);
                }
            }
        }
    }
}
