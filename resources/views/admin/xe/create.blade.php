@extends('layouts.index')

@section('content')
@include('admin.nav')

<div class="row mt-4">
    <div class="col-8 offset-2">
        <div class="card rounded-lg border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between align-items-center py-3">
                    <div>
                        <h5 class="card-title">Thêm mới xe</h5>
                    </div>    
                    <div>
                        <a href="{{ route('xe.index') }}" class="btn btn-outline-info"><i class="fas fa-list-ul"></i> Danh sách</a>
                    </div>    
                </div>
                @include('layouts.notification')
                <form action="{{ route('xe.store') }}" class="mb-3" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="loaiXe">Loại xe</label>
                            <select class="form-control{{ $errors->has('loaixe_id') ? ' is-invalid' : '' }}" name="loaixe_id" id="loaiXe">
                                <option selected disabled>Chọn loại xe</option>
                                @foreach ($loaiXes as $loaiXe)
                                    <option value="{{ $loaiXe->id }}">{{ $loaiXe->ten_loai_xe }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('loaixe_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('loaixe_id') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="tenXe">Tên xe</label>
                            <input type="text" class="form-control{{ $errors->has('ten_xe') ? ' is-invalid' : '' }}" id="tenXe" name="ten_xe" placeholder="Nhập tên xe" required value="{{ old('ten_xe') }}">

                            @if ($errors->has('ten_xe'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ten_xe') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row my-2">
                        <div class="col-md-6">
                            <label for="bienSo">Biển số xe</label>
                            <input type="text" class="form-control{{ $errors->has('bien_so') ? ' is-invalid' : '' }}" id="bienSo" name="bien_so" placeholder="Nhập biển số xe" required value="{{ old('bien_so') }}">

                            @if ($errors->has('bien_so'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('bien_so') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="giaThue">Giá thuê</label>
                            <input type="text" class="form-control{{ $errors->has('gia_thue') ? ' is-invalid' : '' }}" id="giaThue" name="gia_thue" placeholder="Nhập giá thuê" required value="{{ old('gia_thue') }}">

                            @if ($errors->has('gia_thue'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('gia_thue') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="moTa">Mô tả</label>
                        <textarea class="form-control{{ $errors->has('mo_ta') ? ' is-invalid' : '' }}" name="mo_ta" id="moTa" rows="3" placeholder="Nhập mô tả"></textarea>

                        @if ($errors->has('mo_ta'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mo_ta') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <div class="form-group">
                            <label for="inputHinh">Chọn hình</label>
                            <input type="file" class="form-control-file" id="inputHinh" name="hinh">

                            <strong class="text-danger">{{ $errors->first('hinh') }}</strong>
                        </div>                      
                        <div>
                            <button type="reset" class="btn btn-secondary mr-3"><i class="fas fa-sync-alt"></i> Làm mới</button>
                            <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Thêm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection