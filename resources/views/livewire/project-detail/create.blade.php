<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('projectDetail.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.projectDetail.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="projectDetail.user_id" />
        <div class="validation-message">
            {{ $errors->first('projectDetail.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectDetail.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('projectDetail.project_type_id') ? 'invalid' : '' }}">
        <label class="form-label" for="project_type">{{ trans('cruds.projectDetail.fields.project_type') }}</label>
        <x-select-list class="form-control" id="project_type" name="project_type" :options="$this->listsForFields['project_type']" wire:model="projectDetail.project_type_id" />
        <div class="validation-message">
            {{ $errors->first('projectDetail.project_type_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectDetail.fields.project_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('projectDetail.title') ? 'invalid' : '' }}">
        <label class="form-label" for="title">{{ trans('cruds.projectDetail.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" wire:model.defer="projectDetail.title">
        <div class="validation-message">
            {{ $errors->first('projectDetail.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectDetail.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('projectDetail.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.projectDetail.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="projectDetail.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('projectDetail.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectDetail.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.project_detail_code_file') ? 'invalid' : '' }}">
        <label class="form-label" for="code_file">{{ trans('cruds.projectDetail.fields.code_file') }}</label>
        <x-dropzone id="code_file" name="code_file" action="{{ route('admin.project-details.storeMedia') }}" collection-name="project_detail_code_file" max-file-size="200" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.project_detail_code_file') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectDetail.fields.code_file_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('projectDetail.created_by_id') ? 'invalid' : '' }}">
        <label class="form-label" for="created_by">{{ trans('cruds.projectDetail.fields.created_by') }}</label>
        <x-select-list class="form-control" id="created_by" name="created_by" :options="$this->listsForFields['created_by']" wire:model="projectDetail.created_by_id" />
        <div class="validation-message">
            {{ $errors->first('projectDetail.created_by_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectDetail.fields.created_by_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('projectDetail.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.projectDetail.fields.status') }}</label>
        <select class="form-control" wire:model="projectDetail.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('projectDetail.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectDetail.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('laguage') ? 'invalid' : '' }}">
        <label class="form-label" for="laguage">{{ trans('cruds.projectDetail.fields.laguage') }}</label>
        <x-select-list class="form-control" id="laguage" name="laguage" wire:model="laguage" :options="$this->listsForFields['laguage']" multiple />
        <div class="validation-message">
            {{ $errors->first('laguage') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectDetail.fields.laguage_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.project_detail_upload_image') ? 'invalid' : '' }}">
        <label class="form-label" for="upload_image">{{ trans('cruds.projectDetail.fields.upload_image') }}</label>
        <x-dropzone id="upload_image" name="upload_image" action="{{ route('admin.project-details.storeMedia') }}" collection-name="project_detail_upload_image" max-file-size="20" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.project_detail_upload_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectDetail.fields.upload_image_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.project-details.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>