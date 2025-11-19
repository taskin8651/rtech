@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.crousel.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('crousel_create')
                    <a class="btn btn-indigo" href="{{ route('admin.crousels.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.crousel.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('crousel.index')

    </div>
</div>
@endsection