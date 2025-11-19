<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('lesson.month') ? 'invalid' : '' }}">
        <label class="form-label" for="month">{{ trans('cruds.lesson.fields.month') }}</label>
        <input class="form-control" type="text" name="month" id="month" wire:model.defer="lesson.month">
        <div class="validation-message">
            {{ $errors->first('lesson.month') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.lesson.fields.month_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('lesson.title') ? 'invalid' : '' }}">
        <label class="form-label" for="title">{{ trans('cruds.lesson.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" wire:model.defer="lesson.title">
        <div class="validation-message">
            {{ $errors->first('lesson.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.lesson.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('lesson.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.lesson.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="lesson.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('lesson.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.lesson.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.lessons.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>