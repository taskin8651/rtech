@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.crousel.title_singular') }}:
                    {{ trans('cruds.crousel.fields.id') }}
                    {{ $crousel->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('crousel.edit', [$crousel])
        </div>
    </div>
</div>
@endsection