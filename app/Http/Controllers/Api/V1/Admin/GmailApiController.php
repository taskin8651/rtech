<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGmailRequest;
use App\Http\Requests\UpdateGmailRequest;
use App\Http\Resources\Admin\GmailResource;
use App\Models\Gmail;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GmailApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gmail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GmailResource(Gmail::all());
    }

    public function store(StoreGmailRequest $request)
    {
        $gmail = Gmail::create($request->validated());

        return (new GmailResource($gmail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Gmail $gmail)
    {
        abort_if(Gate::denies('gmail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GmailResource($gmail);
    }

    public function update(UpdateGmailRequest $request, Gmail $gmail)
    {
        $gmail->update($request->validated());

        return (new GmailResource($gmail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Gmail $gmail)
    {
        abort_if(Gate::denies('gmail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gmail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
