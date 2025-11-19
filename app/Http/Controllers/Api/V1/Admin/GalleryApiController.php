<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Http\Resources\Admin\GalleryResource;
use App\Models\Gallery;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GalleryApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('gallery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GalleryResource(Gallery::all());
    }

    public function store(StoreGalleryRequest $request)
    {
        $gallery = Gallery::create($request->validated());

        if ($request->input('gallery_upload', false)) {
            $gallery->addMedia(storage_path('tmp/uploads/' . basename($request->input('gallery_upload'))))->toMediaCollection('gallery_upload');
        }

        return (new GalleryResource($gallery))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Gallery $gallery)
    {
        abort_if(Gate::denies('gallery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GalleryResource($gallery);
    }

    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        $gallery->update($request->validated());

        if ($request->input('gallery_upload', false)) {
            if (! $gallery->gallery_upload || $request->input('gallery_upload') !== $gallery->gallery_upload->file_name) {
                if ($gallery->gallery_upload) {
                    $gallery->gallery_upload->delete();
                }
                $gallery->addMedia(storage_path('tmp/uploads/' . basename($request->input('gallery_upload'))))->toMediaCollection('gallery_upload');
            }
        } elseif ($gallery->gallery_upload) {
            $gallery->gallery_upload->delete();
        }

        return (new GalleryResource($gallery))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Gallery $gallery)
    {
        abort_if(Gate::denies('gallery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gallery->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
