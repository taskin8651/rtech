@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.websiteLogo.title_singular') }}:
                    {{ trans('cruds.websiteLogo.fields.id') }}
                    {{ $websiteLogo->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.websiteLogo.fields.id') }}
                            </th>
                            <td>
                                {{ $websiteLogo->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.websiteLogo.fields.tilte') }}
                            </th>
                            <td>
                                {{ $websiteLogo->tilte }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.websiteLogo.fields.logo') }}
                            </th>
                            <td>
                                @foreach($websiteLogo->logo as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.websiteLogo.fields.description') }}
                            </th>
                            <td>
                                {{ $websiteLogo->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('website_logo_edit')
                    <a href="{{ route('admin.website-logos.edit', $websiteLogo) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.website-logos.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection