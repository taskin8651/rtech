<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('user.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.user.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="user.name">
        <div class="validation-message">
            {{ $errors->first('user.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.email') ? 'invalid' : '' }}">
        <label class="form-label required" for="email">{{ trans('cruds.user.fields.email') }}</label>
        <input class="form-control" type="email" name="email" id="email" required wire:model.defer="user.email">
        <div class="validation-message">
            {{ $errors->first('user.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.password') ? 'invalid' : '' }}">
        <label class="form-label required" for="password">{{ trans('cruds.user.fields.password') }}</label>
        <input class="form-control" type="password" name="password" id="password" required wire:model.defer="password">
        <div class="validation-message">
            {{ $errors->first('user.password') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.password_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('roles') ? 'invalid' : '' }}">
        <label class="form-label required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
        <x-select-list class="form-control" required id="roles" name="roles" wire:model="roles" :options="$this->listsForFields['roles']" multiple />
        <div class="validation-message">
            {{ $errors->first('roles') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.roles_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.locale') ? 'invalid' : '' }}">
        <label class="form-label" for="locale">{{ trans('cruds.user.fields.locale') }}</label>
        <input class="form-control" type="text" name="locale" id="locale" wire:model.defer="user.locale">
        <div class="validation-message">
            {{ $errors->first('user.locale') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.locale_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.number') ? 'invalid' : '' }}">
        <label class="form-label" for="number">{{ trans('cruds.user.fields.number') }}</label>
        <input class="form-control" type="text" name="number" id="number" wire:model.defer="user.number">
        <div class="validation-message">
            {{ $errors->first('user.number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.bio') ? 'invalid' : '' }}">
        <label class="form-label" for="bio">{{ trans('cruds.user.fields.bio') }}</label>
        <textarea class="form-control" name="bio" id="bio" wire:model.defer="user.bio" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('user.bio') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.bio_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.education') ? 'invalid' : '' }}">
        <label class="form-label" for="education">{{ trans('cruds.user.fields.education') }}</label>
        <textarea class="form-control" name="education" id="education" wire:model.defer="user.education" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('user.education') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.education_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.user_profile_photo') ? 'invalid' : '' }}">
        <label class="form-label" for="profile_photo">{{ trans('cruds.user.fields.profile_photo') }}</label>
        <x-dropzone id="profile_photo" name="profile_photo" action="{{ route('admin.users.storeMedia') }}" collection-name="user_profile_photo" max-file-size="20" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.user_profile_photo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.profile_photo_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.address') ? 'invalid' : '' }}">
        <label class="form-label" for="address">{{ trans('cruds.user.fields.address') }}</label>
        <textarea class="form-control" name="address" id="address" wire:model.defer="user.address" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('user.address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.address_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>