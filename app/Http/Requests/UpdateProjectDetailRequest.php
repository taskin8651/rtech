<?php

namespace App\Http\Requests;

use App\Models\ProjectDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProjectDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('project_detail_edit'),
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
            'user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'project_type_id' => [
                'integer',
                'exists:project_types,id',
                'nullable',
            ],
            'title' => [
                'string',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'created_by_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'status' => [
                'nullable',
                'in:' . implode(',', array_keys(ProjectDetail::STATUS_SELECT)),
            ],
            'laguage' => [
                'array',
            ],
            'laguage.*.id' => [
                'integer',
                'exists:languages,id',
            ],
        ];
    }
}
