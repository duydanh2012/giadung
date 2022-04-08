<div class="form-group">
    <label class="control-label">{{ __('Block alias') }}</label>
    {!! Form::customSelect('block_alias', get_list_blocks(['status' => Platform\Base\Enums\BaseStatusEnum::PUBLISHED])->pluck('name', 'alias')->toArray(), Arr::get($attributes, 'block_alias')) !!}
</div>
<div class="form-group">
    <label class="control-label">{{ __('Image') }}</label>
    {!! Form::mediaImage('image', Arr::get($attributes, 'image')) !!}
</div>
<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#extendedInfo" aria-expanded="false" aria-controls="extendedInfo">Extended Information</button>
<div class="collapse multi-collapse" id="extendedInfo">
    <div class="card card-body">
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label class="control-label">{{ __('Date') }}</label>
                    {!! Form::text('date', Arr::get($attributes, 'date'), ['class' => 'datepicker form-control']) !!}
                </div>
                <div class="col-6">
                    <label class="control-label">{{ __('Time') }}</label>
                    {!! Form::text('time', Arr::get($attributes, 'time'), ['class' => 'timepicker-24 form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">{{ __('Representative image') }}</label>
                {!! Form::mediaImage('representative_image', Arr::get($attributes, 'representative_image')) !!}
            </div>
            <div class="form-group">
                <label class="control-label">{{ __('Purchase link') }}</label>
                {!! Form::text('purchase_link', Arr::get($attributes, 'purchase_link'), ['class' => 'form-control', 'placeholder' => __('Enter purchase link')]) !!}
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="control-label">{{ __('Gallery images') }}</label>
    {!! Form::mediaImages('gallery_images[]', explode(',', Arr::get($attributes, 'gallery_images'))) !!}
</div>
