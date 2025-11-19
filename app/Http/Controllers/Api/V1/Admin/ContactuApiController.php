<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactuRequest;
use App\Http\Requests\UpdateContactuRequest;
use App\Http\Resources\Admin\ContactuResource;
use App\Models\Contactu;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactuApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contactu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContactuResource(Contactu::all());
    }

    public function store(StoreContactuRequest $request)
    {
        $contactu = Contactu::create($request->validated());

        return (new ContactuResource($contactu))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Contactu $contactu)
    {
        abort_if(Gate::denies('contactu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContactuResource($contactu);
    }

    public function update(UpdateContactuRequest $request, Contactu $contactu)
    {
        $contactu->update($request->validated());

        return (new ContactuResource($contactu))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Contactu $contactu)
    {
        abort_if(Gate::denies('contactu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactu->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
