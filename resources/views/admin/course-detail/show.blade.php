@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.courseDetail.title_singular') }}:
                    {{ trans('cruds.courseDetail.fields.id') }}
                    {{ $courseDetail->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.courseDetail.fields.id') }}
                            </th>
                            <td>
                                {{ $courseDetail->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseDetail.fields.title') }}
                            </th>
                            <td>
                                {{ $courseDetail->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseDetail.fields.short_description') }}
                            </th>
                            <td>
                                {{ $courseDetail->short_description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseDetail.fields.description') }}
                            </th>
                            <td>
                                {{ $courseDetail->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseDetail.fields.upload_image') }}
                            </th>
                            <td>
                                @foreach($courseDetail->upload_image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseDetail.fields.image_1') }}
                            </th>
                            <td>
                                @foreach($courseDetail->image_1 as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseDetail.fields.instructor') }}
                            </th>
                            <td>
                                @if($courseDetail->instructor)
                                    <span class="badge badge-relationship">{{ $courseDetail->instructor->title ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseDetail.fields.category') }}
                            </th>
                            <td>
                                {{ $courseDetail->category }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseDetail.fields.duration') }}
                            </th>
                            <td>
                                {{ $courseDetail->duration }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseDetail.fields.batch') }}
                            </th>
                            <td>
                                {{ $courseDetail->batch }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseDetail.fields.lesson') }}
                            </th>
                            <td>
                                {{ $courseDetail->lesson }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseDetail.fields.student') }}
                            </th>
                            <td>
                                {{ $courseDetail->student }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseDetail.fields.skill_level') }}
                            </th>
                            <td>
                                {{ $courseDetail->skill_level }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseDetail.fields.language') }}
                            </th>
                            <td>
                                {{ $courseDetail->language }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseDetail.fields.price') }}
                            </th>
                            <td>
                                {{ $courseDetail->price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseDetail.fields.languages') }}
                            </th>
                            <td>
                                @foreach($courseDetail->languages as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.courseDetail.fields.lesson_detail') }}
                            </th>
                            <td>
                                @foreach($courseDetail->lessonDetail as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('course_detail_edit')
                    <a href="{{ route('admin.course-details.edit', $courseDetail) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.course-details.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection