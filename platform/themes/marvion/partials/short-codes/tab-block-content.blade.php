@php
    $blockAlias = [];

    for ($i = 1; $i < 5; $i++) { 
        $blockAlias[] = $shortCode->{'block_alias_' . $i};
    }
    $blocks = null;
    if ($blockAlias) {
        $blocks = get_list_blocks([
            ['status', '=', Platform\Base\Enums\BaseStatusEnum::PUBLISHED],
            ['alias', 'IN', $blockAlias]
        ]);
    }
@endphp
@if ($blocks && $blocks->count())
<!-- text hybrid NFT -->
<div class="wrapTabTextHybrid">
    <div class="container-xl">
        <div class="nav nav-tabs" id="nav-tab-Hybrid" role="tablist">
            @foreach ($blockAlias as $blockAlia)
                @if ($block = $blocks->firstWhere('alias', $blockAlia))
                    <a class="nav-link @if ($loop->first) active @endif"
                        id="nav-{{ Str::slug($blockAlia) }}-tab"
                        data-toggle="tab"
                        href="#nav-{{ Str::slug($blockAlia) }}"
                        role="tab"
                        aria-controls="nav-{{ Str::slug($blockAlia) }}"
                        aria-selected="true"
                        title="{{ $block->description }}">{{ $block->description }}</a>
                @endif
            @endforeach
        </div>
        
        <div class="tab-content" id="nav-tabContent-Hybrid">
            @foreach ($blockAlias as $blockAlia)
                @if ($block = $blocks->firstWhere('alias', $blockAlia))
                    <div class="tab-pane fade @if ($loop->first) active show @endif" id="nav-{{ Str::slug($blockAlia) }}" role="tabpanel" aria-labelledby="nav-{{ Str::slug($blockAlia) }}-tab">
                        <div class="contentTextHybrid">
                            {!! $block->content !!}
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<!-- end text hybrid NFT -->
@endif
