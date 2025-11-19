@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.brand.title_singular') }}:
                    {{ trans('cruds.brand.fields.id') }}
                    {{ $brand->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('brand.edit', [$brand])
        </div>
    </div>
</div>
@endsection