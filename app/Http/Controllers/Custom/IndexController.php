<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\CourseDetail;
use App\Models\ProjectType;
use App\Models\Instructor; 
use App\Models\Faq;
use App\Models\Number; // NEW

class IndexController extends Controller
{
    public function index()
{
    $brands = Brand::with('media')->get();
    $courses = CourseDetail::with('media')->get();
    $projectTypes = ProjectType::with('media')->get();
    $instructors = Instructor::with('media')->get();
    $faqs = Faq::latest()->get();  // NEW
    $numbers = Number::first(); // NEW

    return view('custom.index', compact('brands', 'courses', 'projectTypes', 'instructors', 'faqs', 'numbers'));
}


}
