<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Number;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NumberController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('number_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.number.index');
    }

    public function create()
    {
        abort_if(Gate::denies('number_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.number.create');
    }

    public function edit(Number $number)
    {
        abort_if(Gate::denies('number_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.number.edit', compact('number'));
    }

    public function show(Number $number)
    {
        abort_if(Gate::denies('number_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.number.show', compact('number'));
    }

    public function __construct()
    {
        $this->csvImportModel = Number::class;
    }
}
