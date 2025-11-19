@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.projectType.title_singular') }}:
                    {{ trans('cruds.projectType.fields.id') }}
                    {{ $projectType->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.projectType.fields.id') }}
                            </th>
                            <td>
                                {{ $projectType->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectType.fields.title') }}
                            </th>
                            <td>
                                {{ $projectType->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectType.fields.description') }}
                            </th>
                            <td>
                                {{ $projectType->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectType.fields.image') }}
                            </th>
                            <td>
                                @foreach($projectType->image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('project_type_edit')
                    <a href="{{ route('admin.project-types.edit', $projectType) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.project-types.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection