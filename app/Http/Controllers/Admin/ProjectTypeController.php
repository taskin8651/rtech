<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\ProjectType;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectTypeController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('project_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.project-type.index');
    }

    public function create()
    {
        abort_if(Gate::denies('project_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.project-type.create');
    }

    public function edit(ProjectType $projectType)
    {
        abort_if(Gate::denies('project_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.project-type.edit', compact('projectType'));
    }

    public function show(ProjectType $projectType)
    {
        abort_if(Gate::denies('project_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.project-type.show', compact('projectType'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['project_type_create', 'project_type_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

        $model                     = new ProjectType();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }

    public function __construct()
    {
        $this->csvImportModel = ProjectType::class;
    }
}
