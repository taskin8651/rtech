@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.blogDetail.title_singular') }}:
                    {{ trans('cruds.blogDetail.fields.id') }}
                    {{ $blogDetail->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.blogDetail.fields.id') }}
                            </th>
                            <td>
                                {{ $blogDetail->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.blogDetail.fields.title') }}
                            </th>
                            <td>
                                {{ $blogDetail->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.blogDetail.fields.short_description') }}
                            </th>
                            <td>
                                {{ $blogDetail->short_description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.blogDetail.fields.description') }}
                            </th>
                            <td>
                                {{ $blogDetail->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.blogDetail.fields.image') }}
                            </th>
                            <td>
                                @foreach($blogDetail->image as $key => $entry)
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
                @can('blog_detail_edit')
                    <a href="{{ route('admin.blog-details.edit', $blogDetail) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.blog-details.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection