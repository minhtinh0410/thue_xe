@extends('layouts.index')

@section('content')
@include('admin.nav')

<div class="row mt-4">
    <div class="col-6 offset-3">
        <div class="card rounded-lg border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between align-items-center py-3">
                    <div>
                        <h5 class="card-title">Thêm giao dịch</h5>
                    </div>    
                    <div>
                        <a href="{{ route('giao-dich.index') }}" class="btn btn-outline-info"><i class="fas fa-list-ul"></i> Danh sách</a>
                    </div>    
                </div>
                @include('layouts.notification')
                <form action="{{ route('giao-dich.store') }}" class="mb-3" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="bienSo">Biển số xe</label>
                        <input type="text" class="form-control typeahead js_tim_bien_so_xe" id="bienSo" name="xe_bien_so" placeholder="Tìm biển số xe" data-provide="typeahead" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="cmnd">CMND người thuê</label>
                        <input type="text" class="form-control" id="cmnd" name="user_cmnd" placeholder="Tìm CMND người thuê" required>
                    </div>
                    <div class="form-row my-3">
                        <div class="col-md-6">
                            <label for="ngayNhanXe">Ngày nhận xe</label>
                            <input type="text" class="form-control js_my_date_picker" id="ngayNhanXe" name="ngay_nhan_xe" placeholder="Chọn ngày nhận xe" required>
                        </div>
                        <div class="col-md-6">
                            <label for="ngayTraXe">Ngày trả xe</label>
                            <input type="text" class="form-control js_my_date_picker" id="ngayTraXe" name="ngay_tra_xe" placeholder="Chọn ngày trả" required>
                        </div>
                    </div>
                    <div class="form-row my-3">
                        <div class="col-md-6">
                            <label for="soNgay">Số ngày</label>
                        <input type="text" class="form-control" id="soNgay" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="giaThue">Giá thuê/ngày</label>
                            <input type="text" class="form-control" id="giaThue" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        Thành tiền
                    </div>
                    <div class="d-flex flex-row justify-content-end">                   
                        <button type="reset" class="btn btn-secondary mr-3"><i class="fas fa-sync-alt"></i> Làm mới</button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Thêm</button>            
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
{{-- <script src="js/bootstrap3-typeahead.min.js"></script>
    <script>
        $.get("admin/get-bien-so-xe", function(data){
            console.log(data);
            // use a data source with 'id' and 'name' keys
            $(".js_tim_bien_so_xe").typeahead({ source:data });
        }, 'json');        
    </script> --}}
@endsection