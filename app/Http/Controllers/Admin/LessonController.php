<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Lesson;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LessonController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('lesson_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lesson.index');
    }

    public function create()
    {
        abort_if(Gate::denies('lesson_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lesson.create');
    }

    public function edit(Lesson $lesson)
    {
        abort_if(Gate::denies('lesson_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lesson.edit', compact('lesson'));
    }

    public function show(Lesson $lesson)
    {
        abort_if(Gate::denies('lesson_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lesson.show', compact('lesson'));
    }

    public function __construct()
    {
        $this->csvImportModel = Lesson::class;
    }
}
