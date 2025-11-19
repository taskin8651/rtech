<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreCourseDetailRequest;
use App\Http\Requests\UpdateCourseDetailRequest;
use App\Http\Resources\Admin\CourseDetailResource;
use App\Models\CourseDetail;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseDetailApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('course_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CourseDetailResource(CourseDetail::with(['instructor', 'languages', 'lessonDetail'])->get());
    }

    public function store(StoreCourseDetailRequest $request)
    {
        $courseDetail = CourseDetail::create($request->validated());
        $courseDetail->languages()->sync($request->input('languages', []));
        $courseDetail->lessonDetail()->sync($request->input('lessonDetail', []));
        if ($request->input('course_detail_upload_image', false)) {
            $courseDetail->addMedia(storage_path('tmp/uploads/' . basename($request->input('course_detail_upload_image'))))->toMediaCollection('course_detail_upload_image');
        }

        if ($request->input('course_detail_image_1', false)) {
            $courseDetail->addMedia(storage_path('tmp/uploads/' . basename($request->input('course_detail_image_1'))))->toMediaCollection('course_detail_image_1');
        }

        return (new CourseDetailResource($courseDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CourseDetail $courseDetail)
    {
        abort_if(Gate::denies('course_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CourseDetailResource($courseDetail->load(['instructor', 'languages', 'lessonDetail']));
    }

    public function update(UpdateCourseDetailRequest $request, CourseDetail $courseDetail)
    {
        $courseDetail->update($request->validated());
        $courseDetail->languages()->sync($request->input('languages', []));
        $courseDetail->lessonDetail()->sync($request->input('lessonDetail', []));
        if ($request->input('course_detail_upload_image', false)) {
            if (! $courseDetail->course_detail_upload_image || $request->input('course_detail_upload_image') !== $courseDetail->course_detail_upload_image->file_name) {
                if ($courseDetail->course_detail_upload_image) {
                    $courseDetail->course_detail_upload_image->delete();
                }
                $courseDetail->addMedia(storage_path('tmp/uploads/' . basename($request->input('course_detail_upload_image'))))->toMediaCollection('course_detail_upload_image');
            }
        } elseif ($courseDetail->course_detail_upload_image) {
            $courseDetail->course_detail_upload_image->delete();
        }

        if ($request->input('course_detail_image_1', false)) {
            if (! $courseDetail->course_detail_image_1 || $request->input('course_detail_image_1') !== $courseDetail->course_detail_image_1->file_name) {
                if ($courseDetail->course_detail_image_1) {
                    $courseDetail->course_detail_image_1->delete();
                }
                $courseDetail->addMedia(storage_path('tmp/uploads/' . basename($request->input('course_detail_image_1'))))->toMediaCollection('course_detail_image_1');
            }
        } elseif ($courseDetail->course_detail_image_1) {
            $courseDetail->course_detail_image_1->delete();
        }

        return (new CourseDetailResource($courseDetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CourseDetail $courseDetail)
    {
        abort_if(Gate::denies('course_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
