@extends('layouts.index')

@section('content')
@include('admin.nav')

<div class="row mt-4">
    <div class="col-6 offset-3">
        <div class="card rounded-lg border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between align-items-center py-3">
                    <div>
                        <h5 class="card-title">Cập nhật khách hàng <small class="text-muted">{{ $khachHang->ho_ten }}</small></h5>
                    </div>    
                    <div>
                        <a href="{{ route('khach-hang.index') }}" class="btn btn-outline-info"><i class="fas fa-list-ul"></i> Danh sách</a>
                    </div>    
                </div>
                @include('layouts.notification')
                <form action="{{ route('khach-hang.update', $khachHang->id) }}" class="mb-3" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" disabled class="form-control" id="email" value="{{ $khachHang->email}}">
                        <small class="form-text text-muted">Mật khẩu mặc định là 12346</small> 
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
                        <button type="reset" class="btn btn-secondary mr-3"><i class="fas fa-sync-alt"></i> Làm mới</button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Cập nhật</button>            
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection