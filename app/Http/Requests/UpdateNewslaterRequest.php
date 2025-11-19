<?php

namespace App\Http\Requests;

use App\Models\Newslater;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNewslaterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('newslater_edit'),
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
            'mail' => [
                'string',
                'nullable',
            ],
        ];
    }
}
