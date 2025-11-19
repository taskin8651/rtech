<?php

namespace App\Http\Requests;

use App\Models\WebsiteLogo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreWebsiteLogoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('website_logo_create'),
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
            'tilte' => [
                'string',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
