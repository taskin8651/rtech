<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('language.title') ? 'invalid' : '' }}">
        <label class="form-label" for="title">{{ trans('cruds.language.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" wire:model.defer="language.title">
        <div class="validation-message">
            {{ $errors->first('language.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.language.fields.title_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.languages.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>