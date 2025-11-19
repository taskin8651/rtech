<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('courseDetail.title') ? 'invalid' : '' }}">
        <label class="form-label" for="title">{{ trans('cruds.courseDetail.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" wire:model.defer="courseDetail.title">
        <div class="validation-message">
            {{ $errors->first('courseDetail.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseDetail.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('courseDetail.short_description') ? 'invalid' : '' }}">
        <label class="form-label" for="short_description">{{ trans('cruds.courseDetail.fields.short_description') }}</label>
        <textarea class="form-control" name="short_description" id="short_description" wire:model.defer="courseDetail.short_description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('courseDetail.short_description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseDetail.fields.short_description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('courseDetail.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.courseDetail.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="courseDetail.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('courseDetail.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseDetail.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.course_detail_upload_image') ? 'invalid' : '' }}">
        <label class="form-label" for="upload_image">{{ trans('cruds.courseDetail.fields.upload_image') }}</label>
        <x-dropzone id="upload_image" name="upload_image" action="{{ route('admin.course-details.storeMedia') }}" collection-name="course_detail_upload_image" max-file-size="20" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.course_detail_upload_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseDetail.fields.upload_image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.course_detail_image_1') ? 'invalid' : '' }}">
        <label class="form-label" for="image_1">{{ trans('cruds.courseDetail.fields.image_1') }}</label>
        <x-dropzone id="image_1" name="image_1" action="{{ route('admin.course-details.storeMedia') }}" collection-name="course_detail_image_1" max-file-size="20" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.course_detail_image_1') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseDetail.fields.image_1_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('courseDetail.instructor_id') ? 'invalid' : '' }}">
        <label class="form-label" for="instructor">{{ trans('cruds.courseDetail.fields.instructor') }}</label>
        <x-select-list class="form-control" id="instructor" name="instructor" :options="$this->listsForFields['instructor']" wire:model="courseDetail.instructor_id" />
        <div class="validation-message">
            {{ $errors->first('courseDetail.instructor_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseDetail.fields.instructor_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('courseDetail.category') ? 'invalid' : '' }}">
        <label class="form-label" for="category">{{ trans('cruds.courseDetail.fields.category') }}</label>
        <input class="form-control" type="text" name="category" id="category" wire:model.defer="courseDetail.category">
        <div class="validation-message">
            {{ $errors->first('courseDetail.category') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseDetail.fields.category_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('courseDetail.duration') ? 'invalid' : '' }}">
        <label class="form-label" for="duration">{{ trans('cruds.courseDetail.fields.duration') }}</label>
        <input class="form-control" type="text" name="duration" id="duration" wire:model.defer="courseDetail.duration">
        <div class="validation-message">
            {{ $errors->first('courseDetail.duration') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseDetail.fields.duration_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('courseDetail.batch') ? 'invalid' : '' }}">
        <label class="form-label" for="batch">{{ trans('cruds.courseDetail.fields.batch') }}</label>
        <input class="form-control" type="text" name="batch" id="batch" wire:model.defer="courseDetail.batch">
        <div class="validation-message">
            {{ $errors->first('courseDetail.batch') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseDetail.fields.batch_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('courseDetail.lesson') ? 'invalid' : '' }}">
        <label class="form-label" for="lesson">{{ trans('cruds.courseDetail.fields.lesson') }}</label>
        <input class="form-control" type="text" name="lesson" id="lesson" wire:model.defer="courseDetail.lesson">
        <div class="validation-message">
            {{ $errors->first('courseDetail.lesson') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseDetail.fields.lesson_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('courseDetail.student') ? 'invalid' : '' }}">
        <label class="form-label" for="student">{{ trans('cruds.courseDetail.fields.student') }}</label>
        <input class="form-control" type="text" name="student" id="student" wire:model.defer="courseDetail.student">
        <div class="validation-message">
            {{ $errors->first('courseDetail.student') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseDetail.fields.student_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('courseDetail.skill_level') ? 'invalid' : '' }}">
        <label class="form-label" for="skill_level">{{ trans('cruds.courseDetail.fields.skill_level') }}</label>
        <input class="form-control" type="text" name="skill_level" id="skill_level" wire:model.defer="courseDetail.skill_level">
        <div class="validation-message">
            {{ $errors->first('courseDetail.skill_level') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseDetail.fields.skill_level_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('courseDetail.language') ? 'invalid' : '' }}">
        <label class="form-label" for="language">{{ trans('cruds.courseDetail.fields.language') }}</label>
        <input class="form-control" type="text" name="language" id="language" wire:model.defer="courseDetail.language">
        <div class="validation-message">
            {{ $errors->first('courseDetail.language') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseDetail.fields.language_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('courseDetail.price') ? 'invalid' : '' }}">
        <label class="form-label" for="price">{{ trans('cruds.courseDetail.fields.price') }}</label>
        <input class="form-control" type="text" name="price" id="price" wire:model.defer="courseDetail.price">
        <div class="validation-message">
            {{ $errors->first('courseDetail.price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseDetail.fields.price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('languages') ? 'invalid' : '' }}">
        <label class="form-label" for="languages">{{ trans('cruds.courseDetail.fields.languages') }}</label>
        <x-select-list class="form-control" id="languages" name="languages" wire:model="languages" :options="$this->listsForFields['languages']" multiple />
        <div class="validation-message">
            {{ $errors->first('languages') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseDetail.fields.languages_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('lesson_detail') ? 'invalid' : '' }}">
        <label class="form-label" for="lesson_detail">{{ trans('cruds.courseDetail.fields.lesson_detail') }}</label>
        <x-select-list class="form-control" id="lesson_detail" name="lesson_detail" wire:model="lesson_detail" :options="$this->listsForFields['lesson_detail']" multiple />
        <div class="validation-message">
            {{ $errors->first('lesson_detail') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.courseDetail.fields.lesson_detail_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.course-details.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>