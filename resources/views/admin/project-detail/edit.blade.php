@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.projectDetail.title_singular') }}:
                    {{ trans('cruds.projectDetail.fields.id') }}
                    {{ $projectDetail->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('project-detail.edit', [$projectDetail])
        </div>
    </div>
</div>
@endsection