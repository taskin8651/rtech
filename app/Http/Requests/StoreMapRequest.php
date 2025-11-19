<?php

namespace App\Http\Requests;

use App\Models\Map;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMapRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('map_create'),
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
            'map_url' => [
                'string',
                'nullable',
            ],
        ];
    }
}
