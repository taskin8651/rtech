<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewslaterRequest;
use App\Http\Requests\UpdateNewslaterRequest;
use App\Http\Resources\Admin\NewslaterResource;
use App\Models\Newslater;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewslaterApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('newslater_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NewslaterResource(Newslater::all());
    }

    public function store(StoreNewslaterRequest $request)
    {
        $newslater = Newslater::create($request->validated());

        return (new NewslaterResource($newslater))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Newslater $newslater)
    {
        abort_if(Gate::denies('newslater_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NewslaterResource($newslater);
    }

    public function update(UpdateNewslaterRequest $request, Newslater $newslater)
    {
        $newslater->update($request->validated());

        return (new NewslaterResource($newslater))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Newslater $newslater)
    {
        abort_if(Gate::denies('newslater_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newslater->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
