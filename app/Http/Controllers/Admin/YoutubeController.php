<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Youtube;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class YoutubeController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('youtube_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.youtube.index');
    }

    public function create()
    {
        abort_if(Gate::denies('youtube_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.youtube.create');
    }

    public function edit(Youtube $youtube)
    {
        abort_if(Gate::denies('youtube_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.youtube.edit', compact('youtube'));
    }

    public function show(Youtube $youtube)
    {
        abort_if(Gate::denies('youtube_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.youtube.show', compact('youtube'));
    }

    public function __construct()
    {
        $this->csvImportModel = Youtube::class;
    }
}
