<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instructor;

class AboutController extends Controller
{
    public function index()
    {
         $instructors = Instructor::with('media')->get();
        return view('custom.about', compact('instructors'));
    }
}
