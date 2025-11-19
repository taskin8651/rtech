<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\CourseDetail;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseDetailController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('course_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.course-detail.index');
    }

    public function create()
    {
        abort_if(Gate::denies('course_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.course-detail.create');
    }

    public function edit(CourseDetail $courseDetail)
    {
        abort_if(Gate::denies('course_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.course-detail.edit', compact('courseDetail'));
    }

    public function show(CourseDetail $courseDetail)
    {
        abort_if(Gate::denies('course_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseDetail->load('instructor', 'languages', 'lessonDetail');

        return view('admin.course-detail.show', compact('courseDetail'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['course_detail_create', 'course_detail_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

        $model                     = new CourseDetail();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }

    public function __construct()
    {
        $this->csvImportModel = CourseDetail::class;
    }
}
