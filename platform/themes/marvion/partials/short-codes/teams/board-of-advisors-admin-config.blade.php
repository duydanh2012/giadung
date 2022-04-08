<div class="form-group">
    <label class="control-label required">{{ __('Title') }}</label>
    {!! Form::text('title', Arr::get($attributes, 'title'), ['class' => 'form-control', 'placeholder' => __('Board Of Advisors')]) !!}
</div>
