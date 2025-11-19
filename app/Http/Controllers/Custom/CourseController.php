<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\CourseDetail;

class CourseController extends Controller
{
    public function index()
    {
        $courses = CourseDetail::with(['instructor'])
            ->latest()
            ->paginate(12);

        $total = CourseDetail::count();

        return view('custom.courses', compact('courses', 'total'));
    }

   public function show($id)
{
    $course = CourseDetail::with(['instructor', 'lessonDetail', 'languages'])
        ->findOrFail($id);

    $relatedCourses = CourseDetail::with(['instructor'])
        ->where('category', $course->category)
        ->where('id', '!=', $course->id)
        ->take(3)
        ->get();

    return view('custom.course-details', compact('course', 'relatedCourses'));
}

}
