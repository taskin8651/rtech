@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.websiteLogo.title_singular') }}:
                    {{ trans('cruds.websiteLogo.fields.id') }}
                    {{ $websiteLogo->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('website-logo.edit', [$websiteLogo])
        </div>
    </div>
</div>
@endsection