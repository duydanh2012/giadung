@extends('admin.index')

@section('title', 'Dashboard')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            
            <div class="row">
                {{-- <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Area Chart Example
                        </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                    </div>
                </div> --}}
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Số đơn hàng
                        </div>
                        <div class="card-body"><canvas id="myBarChart" data-href="{{ route('admin.statistical') }}" width="100%" height="40"></canvas></div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Đơn hàng đã đặt
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Người nhận</th>
                                <th>Người đặt</th>
                                <th>Tổng tiền</th>
                                <th>Ngày đặt</th>
                                <th>Ngày nhận</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Người nhận</th>
                                <th>Người đặt</th>
                                <th>Tổng tiền</th>
                                <th>Ngày đặt</th>
                                <th>Ngày nhận</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($bills as $item)
                                <tr>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ number_format($item->total, 0, ",", ".") }}.000 ₫</td>
                                    <td>{{ date("d-m-Y", strtotime($item->created_at) ) }}</td>
                                    <td>
                                        @if (!empty($item->delivery_date))
                                            <p class="text-success">{{ date("d-m-Y", strtotime($item->delivery_date) ) }}</p>
                                        @else
                                            <p class="text-warning">Đơn đang vận chuyển</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.bill.detail', $item->code) }}" class="btn border btn-outline-warning"><i class="fa-solid fa-info px-2"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection

