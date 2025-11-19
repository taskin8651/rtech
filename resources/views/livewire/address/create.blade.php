<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('address.title') ? 'invalid' : '' }}">
        <label class="form-label" for="title">{{ trans('cruds.address.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" wire:model.defer="address.title">
        <div class="validation-message">
            {{ $errors->first('address.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.address.fields.title_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.addresses.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>