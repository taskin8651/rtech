@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.newslater.title_singular') }}:
                    {{ trans('cruds.newslater.fields.id') }}
                    {{ $newslater->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.newslater.fields.id') }}
                            </th>
                            <td>
                                {{ $newslater->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.newslater.fields.mail') }}
                            </th>
                            <td>
                                {{ $newslater->mail }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('newslater_edit')
                    <a href="{{ route('admin.newslaters.edit', $newslater) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.newslaters.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection