<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Contactu;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactuController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('contactu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contactu.index');
    }

    public function create()
    {
        abort_if(Gate::denies('contactu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contactu.create');
    }

    public function edit(Contactu $contactu)
    {
        abort_if(Gate::denies('contactu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contactu.edit', compact('contactu'));
    }

    public function show(Contactu $contactu)
    {
        abort_if(Gate::denies('contactu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contactu.show', compact('contactu'));
    }

    public function __construct()
    {
        $this->csvImportModel = Contactu::class;
    }
}
