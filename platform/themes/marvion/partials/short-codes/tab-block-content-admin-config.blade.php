@php
    $blocks = ['' => __('None')] + get_list_blocks(['status' => Platform\Base\Enums\BaseStatusEnum::PUBLISHED])->pluck('name', 'alias')->toArray();
@endphp
@for ($i = 1; $i <= 5; $i++)
    <div class="form-group">
        <label class="control-label">{{ __('Block alias ') . $i }}</label>
        {!! Form::customSelect('block_alias_' . $i, $blocks, Arr::get($attributes, 'block_alias_' . $i)) !!}
    </div>
@endfor
