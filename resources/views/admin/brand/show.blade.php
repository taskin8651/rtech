@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.brand.title_singular') }}:
                    {{ trans('cruds.brand.fields.id') }}
                    {{ $brand->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.brand.fields.id') }}
                            </th>
                            <td>
                                {{ $brand->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.brand.fields.title') }}
                            </th>
                            <td>
                                {{ $brand->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.brand.fields.logo') }}
                            </th>
                            <td>
                                @foreach($brand->logo as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('brand_edit')
                    <a href="{{ route('admin.brands.edit', $brand) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection