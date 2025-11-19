<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreYoutubeRequest;
use App\Http\Requests\UpdateYoutubeRequest;
use App\Http\Resources\Admin\YoutubeResource;
use App\Models\Youtube;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class YoutubeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('youtube_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new YoutubeResource(Youtube::all());
    }

    public function store(StoreYoutubeRequest $request)
    {
        $youtube = Youtube::create($request->validated());

        return (new YoutubeResource($youtube))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Youtube $youtube)
    {
        abort_if(Gate::denies('youtube_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new YoutubeResource($youtube);
    }

    public function update(UpdateYoutubeRequest $request, Youtube $youtube)
    {
        $youtube->update($request->validated());

        return (new YoutubeResource($youtube))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Youtube $youtube)
    {
        abort_if(Gate::denies('youtube_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $youtube->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
