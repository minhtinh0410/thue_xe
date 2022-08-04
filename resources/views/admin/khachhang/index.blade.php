@extends('layouts.index')

@section('content')
@include('admin.nav')

<div class="row mt-4">
    <div class="col-12">
        <div class="card rounded-lg border-0 shadow-sm">
            <div class="card-body">
                @include('layouts.notification')
                <div class="d-flex flex-row justify-content-between align-items-center py-3">
                    <div>
                        <h5 class="card-title">Danh sách khách hàng <span class="text-muted">({{ $khachHangs->count() }} khách hàng)</span></h5>
                    </div>    
                    <div>
                        <a href="{{ route('khach-hang.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Thêm</a>
                    </div>    
                </div>
                <table id="myTable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Email</th>
                        <th scope="col">Họ tên</th>                        
                        <th scope="col">CMND</th>
                        <th scope="col">Ngày sinh</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col" class="text-center">Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $dem = 0;
                        @endphp
                        @forelse ($khachHangs as $khachHang)
                        <tr>
                            <th scope="row">{{ ++$dem }}</th>
                            <td>{{ $khachHang->email }}</td>
                            <td>{{ $khachHang->ho_ten }}</td>
                            <td>{{ $khachHang->cmnd }}</td>
                            <td>{{ date('d/m/Y', strtotime($khachHang->ngay_sinh)) }}</td>
                            <td>{{ $khachHang->so_dien_thoai }}</td>
                            <td>{{ $khachHang->dia_chi }}</td>
                            <td class="text-center">
                                <a href="{{ route('khach-hang.edit', $khachHang->id) }}" class="text-primary mr-3">Cập nhật</a>
                                <a href="#" class="text-danger js_btn_xoa_khach_hang" khachhang-id="{{ $khachHang->id }}">Xóa</a>
                                <form id="js_form_xoa_khach_hang_{{ $khachHang->id }}" action="{{ route('khach-hang.destroy', $khachHang->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="text-center">
                            <td colspan="9">Không có dữ liệu</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('body').on('click', '.js_btn_xoa_khach_hang', function (e) {
                e.preventDefault();
                let id = $(this).attr('khachhang-id');
                if(confirm('Bạn có chắc chắn?')) {
                    $(`#js_form_xoa_khach_hang_${id}`).submit();
                }
            });
        });
    </script>
@endsection