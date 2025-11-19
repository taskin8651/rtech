@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.contactu.title_singular') }}:
                    {{ trans('cruds.contactu.fields.id') }}
                    {{ $contactu->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.contactu.fields.id') }}
                            </th>
                            <td>
                                {{ $contactu->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.contactu.fields.name') }}
                            </th>
                            <td>
                                {{ $contactu->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.contactu.fields.email') }}
                            </th>
                            <td>
                                {{ $contactu->email }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.contactu.fields.number') }}
                            </th>
                            <td>
                                {{ $contactu->number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.contactu.fields.subject') }}
                            </th>
                            <td>
                                {{ $contactu->subject }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.contactu.fields.nessage') }}
                            </th>
                            <td>
                                {{ $contactu->nessage }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('contactu_edit')
                    <a href="{{ route('admin.contactus.edit', $contactu) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.contactus.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection