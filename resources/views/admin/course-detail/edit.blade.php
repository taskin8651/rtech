@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.courseDetail.title_singular') }}:
                    {{ trans('cruds.courseDetail.fields.id') }}
                    {{ $courseDetail->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('course-detail.edit', [$courseDetail])
        </div>
    </div>
</div>
@endsection