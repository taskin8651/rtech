<?php

namespace App\Http\Requests;

use App\Models\Crousel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCrouselRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('crousel_edit'),
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
            'status' => [
                'nullable',
                'in:' . implode(',', array_keys(Crousel::STATUS_SELECT)),
            ],
        ];
    }
}
