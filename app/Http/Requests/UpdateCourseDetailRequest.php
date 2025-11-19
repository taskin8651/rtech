<?php

namespace App\Http\Requests;

use App\Models\CourseDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCourseDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('course_detail_edit'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'short_description' => [
                'string',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'instructor_id' => [
                'integer',
                'exists:instructors,id',
                'nullable',
            ],
            'category' => [
                'string',
                'nullable',
            ],
            'duration' => [
                'string',
                'nullable',
            ],
            'batch' => [
                'string',
                'nullable',
            ],
            'lesson' => [
                'string',
                'nullable',
            ],
            'student' => [
                'string',
                'nullable',
            ],
            'skill_level' => [
                'string',
                'nullable',
            ],
            'language' => [
                'string',
                'nullable',
            ],
            'price' => [
                'string',
                'nullable',
            ],
            'languages' => [
                'array',
            ],
            'languages.*.id' => [
                'integer',
                'exists:languages,id',
            ],
            'lesson_detail' => [
                'array',
            ],
            'lesson_detail.*.id' => [
                'integer',
                'exists:lessons,id',
            ],
        ];
    }
}
