@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.comment.title_singular') }}:
                    {{ trans('cruds.comment.fields.id') }}
                    {{ $comment->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.comment.fields.id') }}
                            </th>
                            <td>
                                {{ $comment->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.comment.fields.user') }}
                            </th>
                            <td>
                                @if($comment->user)
                                    <span class="badge badge-relationship">{{ $comment->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.comment.fields.blog') }}
                            </th>
                            <td>
                                @if($comment->blog)
                                    <span class="badge badge-relationship">{{ $comment->blog->title ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.comment.fields.comment') }}
                            </th>
                            <td>
                                {{ $comment->comment }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.comment.fields.status') }}
                            </th>
                            <td>
                                {{ $comment->status_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('comment_edit')
                    <a href="{{ route('admin.comments.edit', $comment) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.comments.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection