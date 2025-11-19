<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Newslater;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewslaterController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('newslater_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newslater.index');
    }

    public function create()
    {
        abort_if(Gate::denies('newslater_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newslater.create');
    }

    public function edit(Newslater $newslater)
    {
        abort_if(Gate::denies('newslater_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newslater.edit', compact('newslater'));
    }

    public function show(Newslater $newslater)
    {
        abort_if(Gate::denies('newslater_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newslater.show', compact('newslater'));
    }

    public function __construct()
    {
        $this->csvImportModel = Newslater::class;
    }
}
