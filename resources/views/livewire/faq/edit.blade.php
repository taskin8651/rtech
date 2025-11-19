<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('faq.question') ? 'invalid' : '' }}">
        <label class="form-label" for="question">{{ trans('cruds.faq.fields.question') }}</label>
        <input class="form-control" type="text" name="question" id="question" wire:model.defer="faq.question">
        <div class="validation-message">
            {{ $errors->first('faq.question') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.faq.fields.question_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('faq.answer') ? 'invalid' : '' }}">
        <label class="form-label" for="answer">{{ trans('cruds.faq.fields.answer') }}</label>
        <textarea class="form-control" name="answer" id="answer" wire:model.defer="faq.answer" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('faq.answer') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.faq.fields.answer_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>