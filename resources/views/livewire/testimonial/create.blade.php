<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('testimonial.title') ? 'invalid' : '' }}">
        <label class="form-label" for="title">{{ trans('cruds.testimonial.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" wire:model.defer="testimonial.title">
        <div class="validation-message">
            {{ $errors->first('testimonial.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.testimonial.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('testimonial.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.testimonial.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="testimonial.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('testimonial.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.testimonial.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('testimonial.image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.testimonial.fields.image') }}</label>
        <input class="form-control" type="text" name="image" id="image" wire:model.defer="testimonial.image">
        <div class="validation-message">
            {{ $errors->first('testimonial.image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.testimonial.fields.image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('testimonial.rate') ? 'invalid' : '' }}">
        <label class="form-label" for="rate">{{ trans('cruds.testimonial.fields.rate') }}</label>
        <input class="form-control" type="text" name="rate" id="rate" wire:model.defer="testimonial.rate">
        <div class="validation-message">
            {{ $errors->first('testimonial.rate') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.testimonial.fields.rate_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>