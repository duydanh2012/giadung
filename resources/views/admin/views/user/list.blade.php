@extends('admin.index')

@section('title', 'Người dùng')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Người dùng</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Người dùng</li>
            </ol>
            @if (session('alert_success'))
                <div class="alert alert-success">
                    {{session('alert_success')}}
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Bảng danh sách người dùng
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Họ và tên</th>
                                <th class="text-center">Hình đại diện</th>
                                <th>Số điện thoại</th>
                                <th class="text-center">Admin</th>
                                <th>Ngày tạo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Họ và tên</th>
                                <th class="text-center">Hình đại diện</th>
                                <th>Số điện thoại</th>
                                <th  class="text-center">Admin</th>
                                <th>Ngày tạo</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if ($datas->count() <= 0)
                                <tr>
                                    <td colspan="4" class="text-center">Không có dữ liệu</td>
                                </tr>
                            @else
                                @foreach ($datas as $item)
                                    <tr>
                                        <td  class="text-center">{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td class="text-center">
                                            @if ($item->avatar)
                                                <img src="{{ asset($item->avatar) }}" alt="{{ $item->name }}" style="max-width: 100px; max-height: 70px;">
                                            @endif
                                        </td>
                                        <td>{{ ($item->phone) ? '+84 ' . number_format($item->phone, 0, " ", " ") : NULL }}</td>
                                        <td  class="text-center">
                                            @if ($item->role_id == 1)
                                                <li class="text-success" style="list-style: none"><i class="fas fa-circle"></i></li>
                                            @else
                                                <li  style="list-style: none"><i class="fas fa-circle"></i></li>
                                            @endif
                                        </td>
                                        <td>{{ date("d-m-Y", strtotime($item->created_at) ) }}</td>
                                        <td>
                                            <a href="{{ route('user.edit', $item->id) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <button type="button" data-href="{{ route('user.destroy', $item->id) }}" class="btn btn-danger btn-sm btn-delete" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </td>
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
