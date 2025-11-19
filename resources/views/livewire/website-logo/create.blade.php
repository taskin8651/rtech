<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('websiteLogo.tilte') ? 'invalid' : '' }}">
        <label class="form-label" for="tilte">{{ trans('cruds.websiteLogo.fields.tilte') }}</label>
        <input class="form-control" type="text" name="tilte" id="tilte" wire:model.defer="websiteLogo.tilte">
        <div class="validation-message">
            {{ $errors->first('websiteLogo.tilte') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.websiteLogo.fields.tilte_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.website_logo_logo') ? 'invalid' : '' }}">
        <label class="form-label" for="logo">{{ trans('cruds.websiteLogo.fields.logo') }}</label>
        <x-dropzone id="logo" name="logo" action="{{ route('admin.website-logos.storeMedia') }}" collection-name="website_logo_logo" max-file-size="20" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.website_logo_logo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.websiteLogo.fields.logo_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('websiteLogo.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.websiteLogo.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="websiteLogo.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('websiteLogo.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.websiteLogo.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.website-logos.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>