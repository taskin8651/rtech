@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.map.title_singular') }}:
                    {{ trans('cruds.map.fields.id') }}
                    {{ $map->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('map.edit', [$map])
        </div>
    </div>
</div>
@endsection