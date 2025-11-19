<?php

namespace App\Http\Controllers\Custom;

use App\Http\Controllers\Controller;
use App\Models\ProjectDetail;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        // Load project list with relations
        $projects = ProjectDetail::with(['user', 'laguage'])
                    ->latest()
                    ->paginate(6);

        return view('custom.project', compact('projects'));
    }

     public function show($id)
    {
        $project = ProjectDetail::with(['user', 'laguage'])
                    ->findOrFail($id);

        return view('custom.project-details', compact('project'));
    }
}
