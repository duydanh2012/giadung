@extends('public.index')

@section('title', 'Xuất xứ | ' . $type->name)

@section('content')

    @include('public.layouts.slider')

    <section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Xuất xứt</h2>
                        @include('public.partials.origin')
					
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">

                    @include('public.partials.product-type', ['products' => $datas, 'name' => 'Xuất xứ' . $type->name])
					
                    @include('public.partials.new')
					
				</div>
			</div>
		</div>
	</section>
@stop

@section('scripts')
	<script src="{{ asset('assets/js/cart.js') }}"></script>
@stop

