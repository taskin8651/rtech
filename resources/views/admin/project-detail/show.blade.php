@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.projectDetail.title_singular') }}:
                    {{ trans('cruds.projectDetail.fields.id') }}
                    {{ $projectDetail->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.projectDetail.fields.id') }}
                            </th>
                            <td>
                                {{ $projectDetail->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectDetail.fields.user') }}
                            </th>
                            <td>
                                @if($projectDetail->user)
                                    <span class="badge badge-relationship">{{ $projectDetail->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectDetail.fields.project_type') }}
                            </th>
                            <td>
                                @if($projectDetail->projectType)
                                    <span class="badge badge-relationship">{{ $projectDetail->projectType->title ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectDetail.fields.title') }}
                            </th>
                            <td>
                                {{ $projectDetail->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectDetail.fields.description') }}
                            </th>
                            <td>
                                {{ $projectDetail->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectDetail.fields.code_file') }}
                            </th>
                            <td>
                                @foreach($projectDetail->code_file as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectDetail.fields.created_by') }}
                            </th>
                            <td>
                                @if($projectDetail->createdBy)
                                    <span class="badge badge-relationship">{{ $projectDetail->createdBy->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectDetail.fields.status') }}
                            </th>
                            <td>
                                {{ $projectDetail->status_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectDetail.fields.laguage') }}
                            </th>
                            <td>
                                @foreach($projectDetail->laguage as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectDetail.fields.upload_image') }}
                            </th>
                            <td>
                                @foreach($projectDetail->upload_image as $key => $entry)
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
                @can('project_detail_edit')
                    <a href="{{ route('admin.project-details.edit', $projectDetail) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.project-details.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection