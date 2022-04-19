@php
    $types = getTypes(10);
@endphp
<div class="panel-group category-products" id="accordian"><!--category-productsr-->
    @foreach ($types as $item)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="{{ route('public.type', $item->slug) }}">{{ $item->name }}</a></h4>
            </div>
        </div>
    @endforeach
</div><!--/category-products-->
