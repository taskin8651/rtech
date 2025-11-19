<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('blogDetail.title') ? 'invalid' : '' }}">
        <label class="form-label" for="title">{{ trans('cruds.blogDetail.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" wire:model.defer="blogDetail.title">
        <div class="validation-message">
            {{ $errors->first('blogDetail.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.blogDetail.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('blogDetail.short_description') ? 'invalid' : '' }}">
        <label class="form-label" for="short_description">{{ trans('cruds.blogDetail.fields.short_description') }}</label>
        <textarea class="form-control" name="short_description" id="short_description" wire:model.defer="blogDetail.short_description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('blogDetail.short_description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.blogDetail.fields.short_description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('blogDetail.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.blogDetail.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="blogDetail.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('blogDetail.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.blogDetail.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.blog_detail_image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.blogDetail.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.blog-details.storeMedia') }}" collection-name="blog_detail_image" max-file-size="20" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.blog_detail_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.blogDetail.fields.image_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.blog-details.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>