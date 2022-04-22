@extends('admin.index')

@section('title', 'Thông tin đơn hàng' . $bill->code)

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Thông tin đơn hàng</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Thông tin đơn hàng</li>
            </ol>
            @if (session('alert_success'))
                <div class="alert alert-success">
                    {{session('alert_success')}}
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Bảng chi tiết đơn hàng {{ $bill->code }}
                </div>
                <div class="card-body row">
                    <div class="col-md-6">
                        <p><i><b>Người đặt hàng:</b> {{ $bill->user->name }}</i></p>
                        <p><i><b>Người nhận:</b> {{ $bill->name }}</i></p>
                        <p><i><b>Số điện thoại:</b> {{ $bill->phone }}</i></p>
                    </div>
                    <div class="col-md-6">
                        <p><i><b>Ngày đặt hàng:</b> {{ date("d-m-Y", strtotime($bill->created_at) ) }}</i></p>
                        <p><i><b>Ngày nhận hàng:</b> 
                            @if(!empty($bill->delivery_date))
                                {{ date("d-m-Y", strtotime($bill->delivery_date) ) }}
                            @else
                                <span class="text-warning">Đơn đang vận chuyển</span>
                            @endif
                         </i></p>
                        <p><i><b>Địa chỉ:</b> {{ $bill->address }}</i></p>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th class="text-center">Hình</th>
                                <th class="text-center">Giá</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Tổng tiền</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tên</th>
                                <th class="text-center">Hình</th>
                                <th class="text-center">Giá</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Tổng tiền</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if ($data->count() <= 0)
                                <tr>
                                    <td colspan="4" class="text-center">Không có dữ liệu</td>
                                </tr>
                            @else
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td class="text-center">
                                            @if ($item->product->thumbnail)
                                                <img src="{{ asset($item->product->thumbnail) }}" alt="{{ $item->name }}" style="max-width: 100px; max-height: 70px;">
                                            @endif
                                        </td>
                                        <td class="text-center">{{ number_format($item->price, 0, ",", ".") }}.000 ₫</td>
                                        <td class="text-center">{{ $item->number }}</td>
                                        <td class="text-center">{{ number_format($item->price * $item->number, 0, ",", ".") }}.000 ₫</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Xóa người dùng</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Bạn có chắc chắn muốn xóa không?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="" class="delete-confirm" method="POST">
                                    @method('DELETE')
                                    @csrf
                                <button type="submit" class="btn btn-danger" >Xóa</button>
                                </form>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        $(document).ready(function(){
            setTimeout(function() {
                $(".alert-success").hide()
            }, 5000);

            $(document).on('click', '.btn-delete', function(){
                let href = $(this).attr('data-href');
                $(".delete-confirm").attr("action", href);
            });
        })
    </script>
@endsection
