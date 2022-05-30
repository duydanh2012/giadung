@extends('public.index')

@section('title', 'Nhà sản xuất | ' . $type->name)

@section('content')

    @include('public.layouts.slider')

    <section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Nhà sản xuất</h2>
                        @include('public.partials.trademarks')
					
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">

                    @include('public.partials.product-type', ['products' => $datas, 'name' => 'Nhà sản xuất' . $type->name])
					
                    @include('public.partials.new')
					
				</div>
			</div>
		</div>
	</section>
@stop

@section('scripts')
	<script src="{{ asset('assets/js/cart.js') }}"></script>
@stop

