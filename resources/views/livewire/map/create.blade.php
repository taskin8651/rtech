<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('map.map_url') ? 'invalid' : '' }}">
        <label class="form-label" for="map_url">{{ trans('cruds.map.fields.map_url') }}</label>
        <textarea class="form-control" name="map_url" id="map_url" wire:model.defer="map.map_url" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('map.map_url') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.map.fields.map_url_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.maps.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>