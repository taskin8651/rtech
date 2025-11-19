@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.instructor.title_singular') }}:
                    {{ trans('cruds.instructor.fields.id') }}
                    {{ $instructor->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('instructor.edit', [$instructor])
        </div>
    </div>
</div>
@endsection