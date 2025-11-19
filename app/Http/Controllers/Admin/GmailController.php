<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Gmail;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GmailController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('gmail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gmail.index');
    }

    public function create()
    {
        abort_if(Gate::denies('gmail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gmail.create');
    }

    public function edit(Gmail $gmail)
    {
        abort_if(Gate::denies('gmail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gmail.edit', compact('gmail'));
    }

    public function show(Gmail $gmail)
    {
        abort_if(Gate::denies('gmail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gmail.show', compact('gmail'));
    }

    public function __construct()
    {
        $this->csvImportModel = Gmail::class;
    }
}
