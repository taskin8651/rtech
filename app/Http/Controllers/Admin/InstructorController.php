<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Instructor;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InstructorController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('instructor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.instructor.index');
    }

    public function create()
    {
        abort_if(Gate::denies('instructor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.instructor.create');
    }

    public function edit(Instructor $instructor)
    {
        abort_if(Gate::denies('instructor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.instructor.edit', compact('instructor'));
    }

    public function show(Instructor $instructor)
    {
        abort_if(Gate::denies('instructor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.instructor.show', compact('instructor'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['instructor_create', 'instructor_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }
        if (request()->has('max_width') || request()->has('max_height')) {
            $this->validate(request(), [
                'file' => sprintf(
                    'image|dimensions:max_width=%s,max_height=%s',
                    request()->input('max_width', 100000),
                    request()->input('max_height', 100000)
                ),
            ]);
        }

        $model                     = new Instructor();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }

    public function __construct()
    {
        $this->csvImportModel = Instructor::class;
    }
}
