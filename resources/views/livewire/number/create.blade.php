<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('number.title') ? 'invalid' : '' }}">
        <label class="form-label" for="title">{{ trans('cruds.number.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" wire:model.defer="number.title">
        <div class="validation-message">
            {{ $errors->first('number.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.number.fields.title_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.numbers.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>