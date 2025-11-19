<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('gmail.email') ? 'invalid' : '' }}">
        <label class="form-label" for="email">{{ trans('cruds.gmail.fields.email') }}</label>
        <input class="form-control" type="text" name="email" id="email" wire:model.defer="gmail.email">
        <div class="validation-message">
            {{ $errors->first('gmail.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.gmail.fields.email_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.gmails.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>