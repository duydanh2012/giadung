@extends('public.index')

@section('title', 'Sản phẩm | ' . $data->name)

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Danh mục</h2>
                    @include('public.partials.types')
                
                    {{-- <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                                <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                                <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                                <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                            </ul>
                        </div>
                    </div><!--/brands_products--> --}}
                    
                    {{-- <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well text-center">
                             <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                             <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range--> --}}
                
                </div>
            </div>
            
            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-12 col-md-5">
                        <div id="similar-product" class="carousel slide" data-ride="carousel">
                            
                              <!-- Wrapper for slides -->
                                <div class="carousel-inner" >
                                    <div class="carousel-item active" style="height: 380px">
                                        <img class="d-block w-100 h-100" src="{{ asset($data->thumbnail) }}" alt="" />
                                    </div>
                                    @foreach ($medias as $item)
                                        <div class="carousel-item" style="height: 380px">
                                            <img class="d-block w-100 mh-100" src="{{ asset('uploads/products/' . $item->name) }}" alt="First slide" >
                                        </div>
                                    @endforeach   
                                </div>

                              <!-- Controls -->
                              <a class="carousel-control-prev" href="#similar-product" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#similar-product" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="product-information"><!--/product-information-->
                            @if ($data->new)
                                <img src="{{ asset('assets/fontend/images/new.jpg') }}" class="newarrival" alt="" />
                            @endif
                            
                            <h2>{{ $data->name }}</h2>
                            <p>Mã sản phẩm: {{ $data->code }}</p>
                            <div class="price">
                                {{ number_format($data->price,0,",",".") }}.000 ₫
                            </div>
                            <div class="quantity">
                                <label class="quantity">Số lượng:</label>
                                <input type="text" value="1" name="quantity" />
                                <a type="button" class="btn btn-fefault cart btn_add_cart" data-href="{{ route('cart.store') }}" data-value="{{ $data->code }}">
                                    <i class="fa fa-shopping-cart"></i>
                                    Thêm vào giỏ hàng
                                </a>
                            </div>
                            <p><b>Hãng sản xuất:</b> {{ $data->trademark->name }}</p>
                            <p><b>Loại sản phẩm:</b> 
                                @php
                                    $types = '';
                                    foreach($data->types as $type){
                                        $types .= $type->name . ', ';
                                    }
                                    echo(rtrim($types, ', '));
                                @endphp
                            </p>
                            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
                
                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="nav-item active"><a href="#details" class="nav-link" data-toggle="tab">Chi tiết</a></li>
                            <li class="nav-item"><a href="#productRelase" class="nav-link" data-toggle="tab">Sản phẩm cùng hãng</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class=" tab-pane active" id="details" >
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href="javascript:void(0);"><i class="fa-regular fa-clock"></i>{{ date("h:i A", strtotime($data->created_at)) }}</a></li>
                                    <li><a href="javascript:void(0);"><i class="fa-regular fa-calendar"></i>{{ date("d M Y", strtotime($data->created_at)) }}</a></li>
                                </ul>
                                <p>
                                    {!! $data->content !!}
                                </p>
                            </div>
                        </div>
                        <div class=" tab-pane" id="productRelase" >

                            @include('public.partials.product-relase', ['code' => $data->code])
                        </div>
                    </div>
                </div><!--/category-tab-->
                
                @include('public.partials.new')
                
            </div>
        </div>
    </div>
</section>
@stop

@section('scripts')
	<script src="{{ asset('assets/js/cart.js') }}"></script>
@stop
