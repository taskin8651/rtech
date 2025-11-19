<?php

namespace App\Http\Requests;

use App\Models\Number;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNumberRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('number_edit'),
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
        ];
    }
}
