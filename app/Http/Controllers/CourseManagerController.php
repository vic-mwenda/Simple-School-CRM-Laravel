<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CourseManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('campuses')->paginate(5);
        return view('courses.index',compact('courses'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $campuses=Campus::all();
        return view('courses.create',compact('campuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $validatedData = $request->validate([
            'course_name' => 'required|string',
            'campuses' => 'required|array',
            'department' => 'required|string',
            'level' => 'required|string',
        ]);

        $course = new Course();
        $course->course_name = $validatedData['course_name'];
        $course->department = $validatedData['department'];
        $course->level = $validatedData['level'];
        $course->save();

        $course->campuses()->sync($validatedData['campuses']);

        return redirect()->route('course.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
