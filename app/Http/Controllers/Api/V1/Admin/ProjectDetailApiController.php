<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreProjectDetailRequest;
use App\Http\Requests\UpdateProjectDetailRequest;
use App\Http\Resources\Admin\ProjectDetailResource;
use App\Models\ProjectDetail;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectDetailApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('project_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectDetailResource(ProjectDetail::with(['user', 'projectType', 'createdBy', 'laguage'])->get());
    }

    public function store(StoreProjectDetailRequest $request)
    {
        $projectDetail = ProjectDetail::create($request->validated());
        $projectDetail->laguage()->sync($request->input('laguage', []));
        if ($request->input('project_detail_code_file', false)) {
            $projectDetail->addMedia(storage_path('tmp/uploads/' . basename($request->input('project_detail_code_file'))))->toMediaCollection('project_detail_code_file');
        }

        if ($request->input('project_detail_upload_image', false)) {
            $projectDetail->addMedia(storage_path('tmp/uploads/' . basename($request->input('project_detail_upload_image'))))->toMediaCollection('project_detail_upload_image');
        }

        return (new ProjectDetailResource($projectDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProjectDetail $projectDetail)
    {
        abort_if(Gate::denies('project_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectDetailResource($projectDetail->load(['user', 'projectType', 'createdBy', 'laguage']));
    }

    public function update(UpdateProjectDetailRequest $request, ProjectDetail $projectDetail)
    {
        $projectDetail->update($request->validated());
        $projectDetail->laguage()->sync($request->input('laguage', []));
        if ($request->input('project_detail_code_file', false)) {
            if (! $projectDetail->project_detail_code_file || $request->input('project_detail_code_file') !== $projectDetail->project_detail_code_file->file_name) {
                if ($projectDetail->project_detail_code_file) {
                    $projectDetail->project_detail_code_file->delete();
                }
                $projectDetail->addMedia(storage_path('tmp/uploads/' . basename($request->input('project_detail_code_file'))))->toMediaCollection('project_detail_code_file');
            }
        } elseif ($projectDetail->project_detail_code_file) {
            $projectDetail->project_detail_code_file->delete();
        }

        if ($request->input('project_detail_upload_image', false)) {
            if (! $projectDetail->project_detail_upload_image || $request->input('project_detail_upload_image') !== $projectDetail->project_detail_upload_image->file_name) {
                if ($projectDetail->project_detail_upload_image) {
                    $projectDetail->project_detail_upload_image->delete();
                }
                $projectDetail->addMedia(storage_path('tmp/uploads/' . basename($request->input('project_detail_upload_image'))))->toMediaCollection('project_detail_upload_image');
            }
        } elseif ($projectDetail->project_detail_upload_image) {
            $projectDetail->project_detail_upload_image->delete();
        }

        return (new ProjectDetailResource($projectDetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProjectDetail $projectDetail)
    {
        abort_if(Gate::denies('project_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
