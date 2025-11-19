<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('brand.title') ? 'invalid' : '' }}">
        <label class="form-label" for="title">{{ trans('cruds.brand.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" wire:model.defer="brand.title">
        <div class="validation-message">
            {{ $errors->first('brand.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.brand.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.brand_logo') ? 'invalid' : '' }}">
        <label class="form-label" for="logo">{{ trans('cruds.brand.fields.logo') }}</label>
        <x-dropzone id="logo" name="logo" action="{{ route('admin.brands.storeMedia') }}" collection-name="brand_logo" max-file-size="20" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.brand_logo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.brand.fields.logo_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>