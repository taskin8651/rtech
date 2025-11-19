@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.youtube.title_singular') }}:
                    {{ trans('cruds.youtube.fields.id') }}
                    {{ $youtube->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.youtube.fields.id') }}
                            </th>
                            <td>
                                {{ $youtube->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.youtube.fields.title') }}
                            </th>
                            <td>
                                {{ $youtube->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.youtube.fields.url') }}
                            </th>
                            <td>
                                {{ $youtube->url }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('youtube_edit')
                    <a href="{{ route('admin.youtubes.edit', $youtube) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.youtubes.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection