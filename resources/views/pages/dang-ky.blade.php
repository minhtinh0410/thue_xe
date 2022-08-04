@extends('layouts.index')

@section('content')
<div class="row my-4">
    <div class="col-6 offset-3">
        <div class="card border-0 shadow">
            <div class="card-body">
                <h5 class="card-title text-center text-uppercase mt-4">Đăng ký</h5>
                @include('layouts.notification')
                <form action="{{ route('auth.dang-ky') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Nhập email" required value="{{ old('email') }}">

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif  
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Nhập mật khẩu" required>

                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif  
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
                    </div>
                    <div class="form-row my-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control{{ $errors->has('ho_ten') ? ' is-invalid' : '' }}" name="ho_ten" placeholder="Nhập họ tên" required value="{{ old('ho_ten') }}">

                            @if ($errors->has('ho_ten'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ho_ten') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control{{ $errors->has('cmnd') ? ' is-invalid' : '' }}" name="cmnd" placeholder="Nhập CMND" required value="{{ old('cmnd') }}">

                            @if ($errors->has('cmnd'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cmnd') }}</strong>
                            </span>
                            @endif  
                        </div>
                    </div>
                    <div class="form-row my-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control js_my_date_picker" name="ngay_sinh" placeholder="Chọn ngày sinh" required value="{{ old('ngay_sinh') }}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control{{ $errors->has('so_dien_thoai') ? ' is-invalid' : '' }}" name="so_dien_thoai" placeholder="Nhập số điện thoại" required value="{{ old('so_dien_thoai') }}">

                            @if ($errors->has('so_dien_thoai'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('so_dien_thoai') }}</strong>
                            </span>
                            @endif  
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea type="text" class="form-control{{ $errors->has('dia_chi') ? ' is-invalid' : '' }}" name="dia_chi" rows="2" placeholder="Nhập địa chỉ" required>{{ old('dia_chi') }}</textarea>
                        
                        @if ($errors->has('dia_chi'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('dia_chi') }}</strong>
                        </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-dark btn-block mt-4">Đăng ký</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection