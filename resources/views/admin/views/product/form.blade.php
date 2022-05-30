@extends('admin.index')

@section('title', isset($data) ? 'Sửa sản phẩm' : 'Thêm sản phẩm')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
@endsection

@section('content')
@php
    $tempcode = uniqid();
@endphp
<style>
    .dropzone {
        border-radius: 5px;
        border: 1px dashed rgb(0, 135, 247);
    }
    .dropzone .dz-preview:not(.dz-processing) .dz-progress {
        display: none;
    }

    .dropzone .dz-message {
        margin : 50px 0;
    }
</style>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">@if(isset($data)) Sửa sản phẩm @else Thêm sản phẩm @endif</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Sản phẩm</a></li>
                <li class="breadcrumb-item active">@if(isset($data)) Sửa sản phẩm @else Thêm sản phẩm @endif</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                   
                    @if(isset($data))
                        <i class="fa-solid fa-pen-to-square"></i> 
                        Sửa sản phẩm 
                    @else 
                        <i class="fa-solid fa-square-plus"></i>
                        Thêm sản phẩm mới 
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ isset($data) ? route('product.update', $data->id) : route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @if (isset($data))
                            @method('PUT')
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-md-3 border-end">
                                <div class="mb-3 input-group-sm">
                                    <label for="inputAvatar" class="form-label-sm">Hình đại diện</label>
                                    @if (isset($data) && !empty($data->thumbnail))
                                        <div class="thumbnail" style="width: 200px; height: 200px;">
                                            <img src="{{ asset($data->thumbnail) }}" class="img-thumbnail rounded" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover">
                                        </div>
                                    @endif
                                    <input type="file" class="form-control" id="inputAvatar" name="thumbnail" accept="image/*">
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="hot" type="checkbox" id="inputHot" @if((isset($data->hot) && $data->hot == 1)  || (old('hot') == 1)) checked @endif>
                                    <label class="form-check-label" for="inputHot">Hot</label>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" name="new" type="checkbox" id="inputNew" @if((isset($data->new) && $data->new == 1)  || (old('new') == 1)) checked @endif>
                                    <label class="form-check-label" for="inputNew">Sản phẩm mới</label>
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="basic-price-import">Giá Nhập</span>
                                    <input type="number" class="form-control" name="price_import" id="inputPriceImport" value="{{ isset($data) ? $data->price_import : old('price_import') }}" aria-describedby="basic-price-import" required>
                                    <span class="input-group-text">.000 đ</span>
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="basic-quantity">Số lượng</span>
                                    <input type="number" class="form-control" name="quantity" id="inputQuantity" value="{{ isset($data) ? $data->quantity : old('quantity') }}" placeholder="0" aria-describedby="basic-quantity" required>
                                    <span class="input-group-text">Cái</span>
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="basic-price">Giá Bán</span>
                                    <input type="number" class="form-control" name="price" id="inputPrice" value="{{ isset($data) ? $data->price : old('price') }}" aria-describedby="basic-price" required>
                                    <span class="input-group-text">.000 đ</span>
                                </div>

                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="basic-promotion">Giá KM</span>
                                    <input type="number" class="form-control" name="promotion" id="inputPromotion" value="{{ isset($data) ? $data->promotion : old('promotion') }}" aria-describedby="basic-promotion" required>
                                    <span class="input-group-text">.000 đ</span>
                                </div>

                                <div class="mb-3">
                                    <select class="form-select form-select-sm" name="trademark_id" aria-label=".form-select-sm trademark">
                                        <option selected>Thương hiệu</option>
                                        @foreach ($trademarks as $trademark)
                                            <option value="{{ $trademark->id }}"  @if(isset($data) && $data->trademark_id == $trademark->id) selected @endif>{{ $trademark->name }}</option>
                                        @endforeach
                                      </select>
                                </div>

                                <div class="mb-3">
                                    <select class="form-select form-select-sm" name="origin_id" aria-label=".form-select-sm trademark">
                                        <option selected>Xuất xứ</option>
                                        @foreach ($origins as $origin)
                                            <option value="{{ $origin->id }}"  @if(isset($data) && $data->origin_id == $origin->id) selected @endif>{{ $origin->name }}</option>
                                        @endforeach
                                      </select>
                                </div>

                                <div class="mb-3 input-group-sm border ">
                                    <label class="form-label-sm mb-1 ps-1">Loại sản phẩm</label>
                                    @php
                                        $value = [];
                                        if(isset($data)){
                                            $value = $data->types->toArray();
                                        }
                                    @endphp
                                    @if (count($types) > 0)
                                        @include('admin.views.product.checkbox', ['data' => $types, 'value' => $value])
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="mb-3 input-group-sm">
                                    <label for="inputName" class="form-label-sm">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="inputName"
                                      placeholder="Tên sản phẩm" maxlength="255" name="name" value="{{ isset($data) ? $data->name : old('name') }}" required>
                                </div>
          
                                <div class="mb-3 input-group-sm">
                                    <label for="inputDescription" class="form-label-sm">Mô tả</label>
                                    <textarea class="form-control" name="description" id="inputDescription" rows="3" style="height: 100px">{{ isset($data) ? $data->description :  old('description') }}</textarea>
                                </div>

                                <div class="mb-3 input-group-sm" id="dropzonebox">
                                    <label for="document">Hình ảnh</label>
                                    <input type="hidden" name="reference_id" value="{{ isset($data) ? $data->id : $tempcode }}">
                                </div>

                                <div class="mb-3 input-group-sm">
                                    <label for="content" class="form-label">Chi tiết</label>
                                    <textarea class="form-control ckeditor" name="content" id="content">{!! isset($data) ? $data->content :  old('content') !!}</textarea>
                                </div>
        
                            </div>
                            
                        </div>

                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <form method="post" action="{{ route('admin.storeMedia') }}" enctype="multipart/form-data" class="dropzone" id="dropzone">
        @csrf
        <input type="hidden" name="reference_id" value="{{ isset($data) ? $data->id : $tempcode }}">
        @if (isset($media))
            @foreach ($media as $item)
                <div class="dz-preview dz-processing dz-image-preview dz-complete"> 
                    <div class="dz-image">
                        <img src="{{ asset('uploads/products/' . $item->name) }}" alt="" style="width: 100%; height: 100%; object-fit: cover">
                    </div> 
                    <div class="dz-progress"> 
                        <span class="dz-upload" data-dz-uploadprogress="" style="width: 100%;"></span> 
                    </div> 
                    <a class="dz-remove removeImage" href="javascript:undefined;" data-name="{{ $item->name }}" data-value="{{ $item->id }}" data-dz-remove="">Remove file</a>
                </div>
            @endforeach
        @endif

    </form>            
@stop

@section('scripts')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#dropzone").appendTo("#dropzonebox");
        $(document).on('click', '.removeImage', function(){
            var name = $(this).data("name");
            $.ajax({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                type: 'POST',
                url: "{{ route('admin.destroyMedia') }}",
                data: {
                    filename: name,
                    _token: "{{ csrf_token() }}"
                },
                success: function (data){
                    console.log("File deleted successfully!!");
                },
                error: function(e) {
                    console.log(e);
                }
            });    
            $(this).parent().remove();
        })
    })

    Dropzone.options.dropzone =
     {
        maxFilesize: 12,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
           return time+file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        timeout: 5000,
        addRemoveLinks: true,
        removedfile: function(file) 
        {
            var name = file.upload.filename;
            $.ajax({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                type: 'POST',
                url: "{{ route('admin.destroyMedia') }}",
                data: {
                    filename: name,
                    _token: "{{ csrf_token() }}"
                },
                success: function (data){
                    console.log("File deleted successfully!!");
                },
                error: function(e) {
                    console.log(e);
                }});
                var fileRef;
                return (fileRef = file.previewElement) != null ? 
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
        success: function(file, response) 
        {
            console.log(response);
        },
        error: function(file, response)
        {
           return false;
        }
    };
</script>
@if (isset($media) && $media->count() > 0)
    <script type="text/javascript">
            $(document).ready(function(){
                $(".dz-message").css("display", "none");
            })
    </script>
@endif
@stop

