@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.map.title_singular') }}:
                    {{ trans('cruds.map.fields.id') }}
                    {{ $map->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.map.fields.id') }}
                            </th>
                            <td>
                                {{ $map->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.map.fields.map_url') }}
                            </th>
                            <td>
                                {{ $map->map_url }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('map_edit')
                    <a href="{{ route('admin.maps.edit', $map) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.maps.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection