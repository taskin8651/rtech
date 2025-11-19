<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('crousel.title') ? 'invalid' : '' }}">
        <label class="form-label" for="title">{{ trans('cruds.crousel.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" wire:model.defer="crousel.title">
        <div class="validation-message">
            {{ $errors->first('crousel.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.crousel.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.crousel_upload_image') ? 'invalid' : '' }}">
        <label class="form-label" for="upload_image">{{ trans('cruds.crousel.fields.upload_image') }}</label>
        <x-dropzone id="upload_image" name="upload_image" action="{{ route('admin.crousels.storeMedia') }}" collection-name="crousel_upload_image" max-file-size="20" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.crousel_upload_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.crousel.fields.upload_image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('crousel.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.crousel.fields.status') }}</label>
        <select class="form-control" wire:model="crousel.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('crousel.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.crousel.fields.status_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.crousels.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>