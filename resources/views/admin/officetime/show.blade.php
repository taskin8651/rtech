@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.officetime.title_singular') }}:
                    {{ trans('cruds.officetime.fields.id') }}
                    {{ $officetime->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.officetime.fields.id') }}
                            </th>
                            <td>
                                {{ $officetime->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.officetime.fields.start') }}
                            </th>
                            <td>
                                {{ $officetime->start }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.officetime.fields.end') }}
                            </th>
                            <td>
                                {{ $officetime->end }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.officetime.fields.days') }}
                            </th>
                            <td>
                                {{ $officetime->days }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('officetime_edit')
                    <a href="{{ route('admin.officetimes.edit', $officetime) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.officetimes.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection