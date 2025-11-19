<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('contactu.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.contactu.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="contactu.name">
        <div class="validation-message">
            {{ $errors->first('contactu.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.contactu.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('contactu.email') ? 'invalid' : '' }}">
        <label class="form-label" for="email">{{ trans('cruds.contactu.fields.email') }}</label>
        <input class="form-control" type="text" name="email" id="email" wire:model.defer="contactu.email">
        <div class="validation-message">
            {{ $errors->first('contactu.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.contactu.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('contactu.number') ? 'invalid' : '' }}">
        <label class="form-label" for="number">{{ trans('cruds.contactu.fields.number') }}</label>
        <input class="form-control" type="text" name="number" id="number" wire:model.defer="contactu.number">
        <div class="validation-message">
            {{ $errors->first('contactu.number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.contactu.fields.number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('contactu.subject') ? 'invalid' : '' }}">
        <label class="form-label" for="subject">{{ trans('cruds.contactu.fields.subject') }}</label>
        <input class="form-control" type="text" name="subject" id="subject" wire:model.defer="contactu.subject">
        <div class="validation-message">
            {{ $errors->first('contactu.subject') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.contactu.fields.subject_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('contactu.nessage') ? 'invalid' : '' }}">
        <label class="form-label" for="nessage">{{ trans('cruds.contactu.fields.nessage') }}</label>
        <textarea class="form-control" name="nessage" id="nessage" wire:model.defer="contactu.nessage" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('contactu.nessage') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.contactu.fields.nessage_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.contactus.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>