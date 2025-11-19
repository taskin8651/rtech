<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreWebsiteLogoRequest;
use App\Http\Requests\UpdateWebsiteLogoRequest;
use App\Http\Resources\Admin\WebsiteLogoResource;
use App\Models\WebsiteLogo;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WebsiteLogoApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('website_logo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WebsiteLogoResource(WebsiteLogo::all());
    }

    public function store(StoreWebsiteLogoRequest $request)
    {
        $websiteLogo = WebsiteLogo::create($request->validated());

        if ($request->input('website_logo_logo', false)) {
            $websiteLogo->addMedia(storage_path('tmp/uploads/' . basename($request->input('website_logo_logo'))))->toMediaCollection('website_logo_logo');
        }

        return (new WebsiteLogoResource($websiteLogo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(WebsiteLogo $websiteLogo)
    {
        abort_if(Gate::denies('website_logo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WebsiteLogoResource($websiteLogo);
    }

    public function update(UpdateWebsiteLogoRequest $request, WebsiteLogo $websiteLogo)
    {
        $websiteLogo->update($request->validated());

        if ($request->input('website_logo_logo', false)) {
            if (! $websiteLogo->website_logo_logo || $request->input('website_logo_logo') !== $websiteLogo->website_logo_logo->file_name) {
                if ($websiteLogo->website_logo_logo) {
                    $websiteLogo->website_logo_logo->delete();
                }
                $websiteLogo->addMedia(storage_path('tmp/uploads/' . basename($request->input('website_logo_logo'))))->toMediaCollection('website_logo_logo');
            }
        } elseif ($websiteLogo->website_logo_logo) {
            $websiteLogo->website_logo_logo->delete();
        }

        return (new WebsiteLogoResource($websiteLogo))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(WebsiteLogo $websiteLogo)
    {
        abort_if(Gate::denies('website_logo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $websiteLogo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
