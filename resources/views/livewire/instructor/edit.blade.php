<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('instructor.title') ? 'invalid' : '' }}">
        <label class="form-label" for="title">{{ trans('cruds.instructor.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" wire:model.defer="instructor.title">
        <div class="validation-message">
            {{ $errors->first('instructor.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.instructor.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('instructor.designation') ? 'invalid' : '' }}">
        <label class="form-label" for="designation">{{ trans('cruds.instructor.fields.designation') }}</label>
        <input class="form-control" type="text" name="designation" id="designation" wire:model.defer="instructor.designation">
        <div class="validation-message">
            {{ $errors->first('instructor.designation') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.instructor.fields.designation_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.instructor_image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.instructor.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.instructors.storeMedia') }}" collection-name="instructor_image" max-file-size="20" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.instructor_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.instructor.fields.image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('instructor.facebook') ? 'invalid' : '' }}">
        <label class="form-label" for="facebook">{{ trans('cruds.instructor.fields.facebook') }}</label>
        <input class="form-control" type="text" name="facebook" id="facebook" wire:model.defer="instructor.facebook">
        <div class="validation-message">
            {{ $errors->first('instructor.facebook') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.instructor.fields.facebook_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('instructor.instagram') ? 'invalid' : '' }}">
        <label class="form-label" for="instagram">{{ trans('cruds.instructor.fields.instagram') }}</label>
        <input class="form-control" type="text" name="instagram" id="instagram" wire:model.defer="instructor.instagram">
        <div class="validation-message">
            {{ $errors->first('instructor.instagram') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.instructor.fields.instagram_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('instructor.linkedin') ? 'invalid' : '' }}">
        <label class="form-label" for="linkedin">{{ trans('cruds.instructor.fields.linkedin') }}</label>
        <input class="form-control" type="text" name="linkedin" id="linkedin" wire:model.defer="instructor.linkedin">
        <div class="validation-message">
            {{ $errors->first('instructor.linkedin') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.instructor.fields.linkedin_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.instructors.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>