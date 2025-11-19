<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('projectType.title') ? 'invalid' : '' }}">
        <label class="form-label" for="title">{{ trans('cruds.projectType.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" wire:model.defer="projectType.title">
        <div class="validation-message">
            {{ $errors->first('projectType.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectType.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('projectType.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.projectType.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="projectType.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('projectType.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectType.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.project_type_image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.projectType.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.project-types.storeMedia') }}" collection-name="project_type_image" max-file-size="20" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.project_type_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectType.fields.image_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.project-types.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>