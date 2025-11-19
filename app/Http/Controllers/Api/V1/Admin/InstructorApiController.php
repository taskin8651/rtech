<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreInstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;
use App\Http\Resources\Admin\InstructorResource;
use App\Models\Instructor;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InstructorApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('instructor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InstructorResource(Instructor::all());
    }

    public function store(StoreInstructorRequest $request)
    {
        $instructor = Instructor::create($request->validated());

        if ($request->input('instructor_image', false)) {
            $instructor->addMedia(storage_path('tmp/uploads/' . basename($request->input('instructor_image'))))->toMediaCollection('instructor_image');
        }

        return (new InstructorResource($instructor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Instructor $instructor)
    {
        abort_if(Gate::denies('instructor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InstructorResource($instructor);
    }

    public function update(UpdateInstructorRequest $request, Instructor $instructor)
    {
        $instructor->update($request->validated());

        if ($request->input('instructor_image', false)) {
            if (! $instructor->instructor_image || $request->input('instructor_image') !== $instructor->instructor_image->file_name) {
                if ($instructor->instructor_image) {
                    $instructor->instructor_image->delete();
                }
                $instructor->addMedia(storage_path('tmp/uploads/' . basename($request->input('instructor_image'))))->toMediaCollection('instructor_image');
            }
        } elseif ($instructor->instructor_image) {
            $instructor->instructor_image->delete();
        }

        return (new InstructorResource($instructor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Instructor $instructor)
    {
        abort_if(Gate::denies('instructor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $instructor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
