<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('officetime.start') ? 'invalid' : '' }}">
        <label class="form-label" for="start">{{ trans('cruds.officetime.fields.start') }}</label>
        <input class="form-control" type="text" name="start" id="start" wire:model.defer="officetime.start">
        <div class="validation-message">
            {{ $errors->first('officetime.start') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.officetime.fields.start_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('officetime.end') ? 'invalid' : '' }}">
        <label class="form-label" for="end">{{ trans('cruds.officetime.fields.end') }}</label>
        <input class="form-control" type="text" name="end" id="end" wire:model.defer="officetime.end">
        <div class="validation-message">
            {{ $errors->first('officetime.end') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.officetime.fields.end_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('officetime.days') ? 'invalid' : '' }}">
        <label class="form-label" for="days">{{ trans('cruds.officetime.fields.days') }}</label>
        <input class="form-control" type="text" name="days" id="days" wire:model.defer="officetime.days">
        <div class="validation-message">
            {{ $errors->first('officetime.days') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.officetime.fields.days_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.officetimes.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>