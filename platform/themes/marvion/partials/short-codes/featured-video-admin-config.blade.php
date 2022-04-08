<div class="form-group">
    <label class="control-label required">{{ __('Video') }}</label>
    {!! Form::text('video', Arr::get($attributes, 'image'), ['class' => 'form-control', 'placeholder' => 'https://www.youtube.com/watch?v=__VIDEO_ID__']) !!}
</div>
<div class="form-group">
    <label class="control-label required">{{ __('Image') }}</label>
    {!! Form::mediaImage('image', Arr::get($attributes, 'image')) !!}
</div>
