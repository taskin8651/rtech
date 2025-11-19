@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.number.title_singular') }}:
                    {{ trans('cruds.number.fields.id') }}
                    {{ $number->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('number.edit', [$number])
        </div>
    </div>
</div>
@endsection