<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Officetime;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OfficetimeController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('officetime_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.officetime.index');
    }

    public function create()
    {
        abort_if(Gate::denies('officetime_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.officetime.create');
    }

    public function edit(Officetime $officetime)
    {
        abort_if(Gate::denies('officetime_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.officetime.edit', compact('officetime'));
    }

    public function show(Officetime $officetime)
    {
        abort_if(Gate::denies('officetime_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.officetime.show', compact('officetime'));
    }

    public function __construct()
    {
        $this->csvImportModel = Officetime::class;
    }
}
