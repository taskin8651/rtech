<?php

namespace App\Http\Requests;

use App\Models\Gmail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGmailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('gmail_create'),
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
            'email' => [
                'string',
                'nullable',
            ],
        ];
    }
}
