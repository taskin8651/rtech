<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Map;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MapController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('map_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.map.index');
    }

    public function create()
    {
        abort_if(Gate::denies('map_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.map.create');
    }

    public function edit(Map $map)
    {
        abort_if(Gate::denies('map_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.map.edit', compact('map'));
    }

    public function show(Map $map)
    {
        abort_if(Gate::denies('map_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.map.show', compact('map'));
    }

    public function __construct()
    {
        $this->csvImportModel = Map::class;
    }
}
