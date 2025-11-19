@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.officetime.title_singular') }}:
                    {{ trans('cruds.officetime.fields.id') }}
                    {{ $officetime->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('officetime.edit', [$officetime])
        </div>
    </div>
</div>
@endsection