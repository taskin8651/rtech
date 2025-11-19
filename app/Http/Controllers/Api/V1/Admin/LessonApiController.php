<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Http\Resources\Admin\LessonResource;
use App\Models\Lesson;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LessonApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lesson_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LessonResource(Lesson::all());
    }

    public function store(StoreLessonRequest $request)
    {
        $lesson = Lesson::create($request->validated());

        return (new LessonResource($lesson))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Lesson $lesson)
    {
        abort_if(Gate::denies('lesson_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LessonResource($lesson);
    }

    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $lesson->update($request->validated());

        return (new LessonResource($lesson))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Lesson $lesson)
    {
        abort_if(Gate::denies('lesson_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lesson->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
