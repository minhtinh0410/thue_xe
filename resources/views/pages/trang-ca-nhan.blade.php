@extends('layouts.index')

@section('content')
<div class="row">
    <div class="col-8 offset-2">
        <div class="card border-0 rounded-lg shadow">
            <div class="card-body">
                <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">Thông tin cá nhân</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-history-tab" data-toggle="pill" href="#pills-history" role="tab" aria-controls="pills-history" aria-selected="false">Lịch sử đặt xe</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        @include('layouts.notification')
                        <form action="{{ route('auth.update') }}" class="mb-3" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" disabled class="form-control" id="email" value="{{ $khachHang->email}}">
                            </div>
                            <div class="form-row my-3">
                                <div class="col-md-6">
                                    <label for="hoTen">Họ tên</label>
                                    <input type="text" class="form-control{{ $errors->has('ho_ten') ? ' is-invalid' : '' }}" id="hoTen" name="ho_ten" placeholder="Nhập họ tên" required value="{{ $khachHang->ho_ten }}">

                                    @if ($errors->has('ho_ten'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ho_ten') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="cmnd">CMND</label>
                                    <input type="text" disabled class="form-control" id="cmnd" value="{{ $khachHang->cmnd }}">
                                </div>
                            </div>
                            <div class="form-row my-3">
                                <div class="col-md-6">
                                    <label for="ngaySinh">Ngày sinh</label>
                                    <input type="text" class="form-control js_my_date_picker" id="ngaySinh" name="ngay_sinh" placeholder="Chọn ngày sinh" required value="{{ date('d/m/Y', strtotime($khachHang->ngay_sinh)) }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="soDienThoai">Số điện thoại</label>
                                    <input type="text" class="form-control{{ $errors->has('so_dien_thoai') ? ' is-invalid' : '' }}" id="soDienThoai" name="so_dien_thoai" placeholder="Nhập số điện thoại" required value="{{ $khachHang->so_dien_thoai }}">

                                    @if ($errors->has('so_dien_thoai'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('so_dien_thoai') }}</strong>
                                    </span>
                                    @endif  
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="diaChi">Địa chỉ</label>
                                <textarea type="text" class="form-control{{ $errors->has('dia_chi') ? ' is-invalid' : '' }}" id="diaChi" name="dia_chi" rows="2" placeholder="Nhập địa chỉ" required>{{ $khachHang->dia_chi }}</textarea>
                                
                                @if ($errors->has('dia_chi'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dia_chi') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="d-flex flex-row justify-content-end">                   
                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Cập nhật</button>            
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-history" role="tabpanel" aria-labelledby="pills-history-tab">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Xe</th>
                                    <th scope="col">Ngày nhận xe</th>
                                    <th scope="col">Ngày trả xe</th>
                                    <th scope="col">Thành tiền</th>
                                    <th scope="col">Ngày tạo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $dem = 0;
                                @endphp
                                @forelse ($giaoDichs as $giaoDich)
                                    <tr>
                                        <th scope="row">{{ ++$dem }}</th>
                                        <td>{{ $giaoDich->xe_bien_so }}</td>
                                        <td>{{ date('d/m/Y', strtotime($giaoDich->ngay_nhan_xe)) }}</td>
                                        <td>{{ date('d/m/Y', strtotime($giaoDich->ngay_tra_xe)) }}</td>
                                        <td>{{ number_format($giaoDich->thanh_tien) }} đồng</td>
                                        <td>{{ date('d/m/Y', strtotime($giaoDich->created_at)) }}</td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="6">Không có lịch sử</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection