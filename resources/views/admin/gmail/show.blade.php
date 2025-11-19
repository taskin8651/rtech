@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.gmail.title_singular') }}:
                    {{ trans('cruds.gmail.fields.id') }}
                    {{ $gmail->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.gmail.fields.id') }}
                            </th>
                            <td>
                                {{ $gmail->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.gmail.fields.email') }}
                            </th>
                            <td>
                                {{ $gmail->email }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('gmail_edit')
                    <a href="{{ route('admin.gmails.edit', $gmail) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.gmails.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection