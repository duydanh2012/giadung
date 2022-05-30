@extends('public.index')

@section('title', 'Danh mục | ' . $type->name)

@section('content')

    @include('public.layouts.slider')

    <section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục</h2>
                        @include('public.partials.types')
					
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">

                    @include('public.partials.product-type', ['products' => $datas, 'name' => 'Danh mục ' . $type->name])
					
                    @include('public.partials.new')
					
				</div>
			</div>
		</div>
	</section>
@stop

@section('scripts')
	<script src="{{ asset('assets/js/cart.js') }}"></script>
@stop

