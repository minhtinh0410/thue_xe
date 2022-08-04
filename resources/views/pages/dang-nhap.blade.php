@extends('layouts.index')

@section('content')
<div class="row my-4">
    <div class="col-6 offset-3">
        <div class="card border-0 shadow">
            <div class="card-body">
                <h5 class="card-title text-center text-uppercase mb-4">Đăng nhập</h5>
                @include('layouts.notification')
                <form action="{{ route('auth.dang-nhap') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Nhập email" required value="{{ old('email') }}">

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Nhập mật khẩu" required>

                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-dark btn-block mt-4">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection