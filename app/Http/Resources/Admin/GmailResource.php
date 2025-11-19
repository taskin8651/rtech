<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class GmailResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
