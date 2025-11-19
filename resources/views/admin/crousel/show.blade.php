@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.crousel.title_singular') }}:
                    {{ trans('cruds.crousel.fields.id') }}
                    {{ $crousel->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.crousel.fields.id') }}
                            </th>
                            <td>
                                {{ $crousel->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.crousel.fields.title') }}
                            </th>
                            <td>
                                {{ $crousel->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.crousel.fields.upload_image') }}
                            </th>
                            <td>
                                @foreach($crousel->upload_image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.crousel.fields.status') }}
                            </th>
                            <td>
                                {{ $crousel->status_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('crousel_edit')
                    <a href="{{ route('admin.crousels.edit', $crousel) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.crousels.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection