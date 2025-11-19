<?php

namespace App\Http\Requests;

use App\Models\Officetime;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOfficetimeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('officetime_create'),
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
            'start' => [
                'string',
                'nullable',
            ],
            'end' => [
                'string',
                'nullable',
            ],
            'days' => [
                'string',
                'nullable',
            ],
        ];
    }
}
