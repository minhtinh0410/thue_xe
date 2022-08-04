@extends('layouts.index')

@section('content')
@include('admin.nav')

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card rounded-lg border-0 shadow">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                    <div class="lead font-weight-normal text-uppercase py-3">Khách hàng</div>
                    <div class="text-danger py-3 my-auto"><span class="font-weight-bold mr-2">{{ $totalKhachHang }} kh</span> <i class="fas fa-users"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card rounded-lg border-0 shadow">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                    <div class="lead font-weight-normal text-uppercase py-3">Tổng xe</div>
                    <div class="text-info py-3 my-auto"><span class="font-weight-bold mr-2">{{ $totalXe }} xe</span> <i class="fas fa-car"></i></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card rounded-lg border-0 shadow">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                    <div class="lead font-weight-normal text-uppercase py-3">Doanh thu</div>
                    <div class="text-success py-3 my-auto"><span class="font-weight-bold mr-2">{{ number_format($totalMoney[0]->total_money) }} đồng</span> <i class="fas fa-hand-holding-usd"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8 mt-4">
        <div class="card rounded-lg border-0 shadow">
            <div class="card-body">
                <h6 class="card-title">Danh sách cho thuê xe ngày {{ date('d/m/Y') }}</h6>
                <table id="myTable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Xe</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @forelse ($giaoDichTodays as $giaoDichToday)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $giaoDichToday->xe->ten_xe }}</td>
                                <td>{{ $giaoDichToday->user->ho_ten }}</td>
                                <td>{{ number_format($giaoDichToday->thanh_tien) }} đồng</td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="4">Không có dữ liệu</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4 mt-4">
        <div class="card rounded-lg border-0 shadow">
            <div class="card-body">
                <h6 class="card-title text-center text-uppercase">Xe cho thuê nhiều</h6>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="d-flex flex-row justify-content-between">
                            <span>#No</span>
                            <span>Tên xe</span>
                            <span>Số lần</span>
                        </div>
                    </li>
                    @php
                        $j = 0;
                    @endphp
                    @forelse ($topXes as $topXe)
                        <li class="list-group-item">
                            <div class="d-flex flex-row justify-content-between">
                                <strong>{{ ++$j }}</strong>
                                <a href="{{ route('xe.show', $topXe->id) }}" class="text-dark">{{ $topXe->ten_xe }}</a>
                                <span>{{ $topXe->times }} <small>lần</small></span>
                            </div>
                        </li>    
                    @empty
                        <li class="list-group-item">
                            <div class="d-flex flex-row justify-content-center">
                                <span>Chưa có dữ liệu</span>
                            </div>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection