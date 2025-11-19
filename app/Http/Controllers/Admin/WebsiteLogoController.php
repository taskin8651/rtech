<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\WebsiteLogo;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WebsiteLogoController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('website_logo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.website-logo.index');
    }

    public function create()
    {
        abort_if(Gate::denies('website_logo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.website-logo.create');
    }

    public function edit(WebsiteLogo $websiteLogo)
    {
        abort_if(Gate::denies('website_logo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.website-logo.edit', compact('websiteLogo'));
    }

    public function show(WebsiteLogo $websiteLogo)
    {
        abort_if(Gate::denies('website_logo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.website-logo.show', compact('websiteLogo'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['website_logo_create', 'website_logo_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }
        if (request()->has('max_width') || request()->has('max_height')) {
            $this->validate(request(), [
                'file' => sprintf(
                    'image|dimensions:max_width=%s,max_height=%s',
                    request()->input('max_width', 100000),
                    request()->input('max_height', 100000)
                ),
            ]);
        }

        $model                     = new WebsiteLogo();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }

    public function __construct()
    {
        $this->csvImportModel = WebsiteLogo::class;
    }
}
