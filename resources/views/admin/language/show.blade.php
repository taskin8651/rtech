@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.language.title_singular') }}:
                    {{ trans('cruds.language.fields.id') }}
                    {{ $language->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.language.fields.id') }}
                            </th>
                            <td>
                                {{ $language->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.language.fields.title') }}
                            </th>
                            <td>
                                {{ $language->title }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('language_edit')
                    <a href="{{ route('admin.languages.edit', $language) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.languages.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection