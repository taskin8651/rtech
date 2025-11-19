<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('youtube.title') ? 'invalid' : '' }}">
        <label class="form-label" for="title">{{ trans('cruds.youtube.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" wire:model.defer="youtube.title">
        <div class="validation-message">
            {{ $errors->first('youtube.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.youtube.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('youtube.url') ? 'invalid' : '' }}">
        <label class="form-label" for="url">{{ trans('cruds.youtube.fields.url') }}</label>
        <textarea class="form-control" name="url" id="url" wire:model.defer="youtube.url" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('youtube.url') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.youtube.fields.url_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.youtubes.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>