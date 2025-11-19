<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('newslater.mail') ? 'invalid' : '' }}">
        <label class="form-label" for="mail">{{ trans('cruds.newslater.fields.mail') }}</label>
        <input class="form-control" type="text" name="mail" id="mail" wire:model.defer="newslater.mail">
        <div class="validation-message">
            {{ $errors->first('newslater.mail') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.newslater.fields.mail_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.newslaters.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>