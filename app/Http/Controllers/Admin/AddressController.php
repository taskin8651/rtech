<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Address;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AddressController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('address_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.address.index');
    }

    public function create()
    {
        abort_if(Gate::denies('address_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.address.create');
    }

    public function edit(Address $address)
    {
        abort_if(Gate::denies('address_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.address.edit', compact('address'));
    }

    public function show(Address $address)
    {
        abort_if(Gate::denies('address_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.address.show', compact('address'));
    }

    public function __construct()
    {
        $this->csvImportModel = Address::class;
    }
}
