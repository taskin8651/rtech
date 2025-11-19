<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('gallery.title') ? 'invalid' : '' }}">
        <label class="form-label" for="title">{{ trans('cruds.gallery.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" wire:model.defer="gallery.title">
        <div class="validation-message">
            {{ $errors->first('gallery.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.gallery.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.gallery_upload') ? 'invalid' : '' }}">
        <label class="form-label" for="upload">{{ trans('cruds.gallery.fields.upload') }}</label>
        <x-dropzone id="upload" name="upload" action="{{ route('admin.galleries.storeMedia') }}" collection-name="gallery_upload" max-file-size="20" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.gallery_upload') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.gallery.fields.upload_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('gallery.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.gallery.fields.status') }}</label>
        <select class="form-control" wire:model="gallery.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('gallery.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.gallery.fields.status_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>