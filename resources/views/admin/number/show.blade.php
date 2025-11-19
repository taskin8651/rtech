@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.number.title_singular') }}:
                    {{ trans('cruds.number.fields.id') }}
                    {{ $number->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.number.fields.id') }}
                            </th>
                            <td>
                                {{ $number->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.number.fields.title') }}
                            </th>
                            <td>
                                {{ $number->title }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('number_edit')
                    <a href="{{ route('admin.numbers.edit', $number) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.numbers.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection