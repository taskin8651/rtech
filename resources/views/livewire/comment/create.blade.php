<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('comment.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.comment.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="comment.user_id" />
        <div class="validation-message">
            {{ $errors->first('comment.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.comment.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('comment.blog_id') ? 'invalid' : '' }}">
        <label class="form-label" for="blog">{{ trans('cruds.comment.fields.blog') }}</label>
        <x-select-list class="form-control" id="blog" name="blog" :options="$this->listsForFields['blog']" wire:model="comment.blog_id" />
        <div class="validation-message">
            {{ $errors->first('comment.blog_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.comment.fields.blog_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('comment.comment') ? 'invalid' : '' }}">
        <label class="form-label" for="comment">{{ trans('cruds.comment.fields.comment') }}</label>
        <textarea class="form-control" name="comment" id="comment" wire:model.defer="comment.comment" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('comment.comment') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.comment.fields.comment_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('comment.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.comment.fields.status') }}</label>
        <select class="form-control" wire:model="comment.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('comment.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.comment.fields.status_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.comments.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>