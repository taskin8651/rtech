<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\ProjectDetail;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectDetailController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('project_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.project-detail.index');
    }

    public function create()
    {
        abort_if(Gate::denies('project_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.project-detail.create');
    }

    public function edit(ProjectDetail $projectDetail)
    {
        abort_if(Gate::denies('project_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.project-detail.edit', compact('projectDetail'));
    }

    public function show(ProjectDetail $projectDetail)
    {
        abort_if(Gate::denies('project_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectDetail->load('user', 'projectType', 'createdBy', 'laguage');

        return view('admin.project-detail.show', compact('projectDetail'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['project_detail_create', 'project_detail_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

        $model                     = new ProjectDetail();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }

    public function __construct()
    {
        $this->csvImportModel = ProjectDetail::class;
    }
}
