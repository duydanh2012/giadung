<div class="form-group">
    <label class="control-label">{{ __('Block alias') }}</label>
    {!! Form::customSelect('block_alias', get_list_blocks(['status' => Platform\Base\Enums\BaseStatusEnum::PUBLISHED])->pluck('name', 'alias')->toArray(), Arr::get($attributes, 'block_alias')) !!}
</div>
<div class="form-group">
    <label class="control-label">{{ __('Link') }}</label>
    {!! Form::text('link', Arr::get($attributes, 'link'), ['class' => 'form-control', 'placeholder' => __('Enter link')]) !!}
</div>
