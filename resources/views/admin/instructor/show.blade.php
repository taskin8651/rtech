@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.instructor.title_singular') }}:
                    {{ trans('cruds.instructor.fields.id') }}
                    {{ $instructor->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.instructor.fields.id') }}
                            </th>
                            <td>
                                {{ $instructor->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.instructor.fields.title') }}
                            </th>
                            <td>
                                {{ $instructor->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.instructor.fields.designation') }}
                            </th>
                            <td>
                                {{ $instructor->designation }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.instructor.fields.image') }}
                            </th>
                            <td>
                                @foreach($instructor->image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.instructor.fields.facebook') }}
                            </th>
                            <td>
                                {{ $instructor->facebook }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.instructor.fields.instagram') }}
                            </th>
                            <td>
                                {{ $instructor->instagram }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.instructor.fields.linkedin') }}
                            </th>
                            <td>
                                {{ $instructor->linkedin }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('instructor_edit')
                    <a href="{{ route('admin.instructors.edit', $instructor) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.instructors.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection