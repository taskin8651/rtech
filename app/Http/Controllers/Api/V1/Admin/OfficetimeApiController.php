<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfficetimeRequest;
use App\Http\Requests\UpdateOfficetimeRequest;
use App\Http\Resources\Admin\OfficetimeResource;
use App\Models\Officetime;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OfficetimeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('officetime_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OfficetimeResource(Officetime::all());
    }

    public function store(StoreOfficetimeRequest $request)
    {
        $officetime = Officetime::create($request->validated());

        return (new OfficetimeResource($officetime))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Officetime $officetime)
    {
        abort_if(Gate::denies('officetime_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OfficetimeResource($officetime);
    }

    public function update(UpdateOfficetimeRequest $request, Officetime $officetime)
    {
        $officetime->update($request->validated());

        return (new OfficetimeResource($officetime))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Officetime $officetime)
    {
        abort_if(Gate::denies('officetime_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $officetime->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
