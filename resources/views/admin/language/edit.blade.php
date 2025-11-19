@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.language.title_singular') }}:
                    {{ trans('cruds.language.fields.id') }}
                    {{ $language->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('language.edit', [$language])
        </div>
    </div>
</div>
@endsection