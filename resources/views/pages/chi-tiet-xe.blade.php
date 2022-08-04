@extends('layouts.index')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="shadow overflow-hidden">
            <img class="w-100 rounded-lg" src="upload/xes/{{ $xe->hinh }}" alt="{{ $xe->ten_xe }}">
        </div>
        <div class="card rounded-lg border-0 shadow mt-4">
            <div class="card-body">
                <h6 class="card-title text-center text-uppercase">Thông tin xe</h6>
                <div class="d-flex flex-row justify-content-between">
                    <p class="card-text">Tên xe <strong class="js_ten_xe">{{ $xe->ten_xe }}</strong></p>
                    <p class="card-text">Biển số <strong>{{ $xe->bien_so }}</strong></p>
                    <p class="card-text">Giá thuê/ngày <strong>{{ number_format($xe->gia_thue) }} đồng</strong></p>
                    <p class="card-text">Loại xe <strong class="js_ten_loai_xe">{{ $xe->loaiXe->ten_loai_xe }}</strong></p>
                </div>
                <p class="card-text">Mô tả <strong>{{ $xe->mo_ta != null ? $xe->mo_ta : 'Không có' }}</strong></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card rounded-lg border-0 shadow mt-4 mt-md-0">
            <div class="card-body">
                <h5 class="card-title text-center text-uppercase">Thuê xe</h5>
                <div class="form-row mb-3">
                    <div class="col-6">
                        <label for="bienSo">Biển số</label>
                        <input type="text" disabled class="form-control js_bien_so" id="bienSo" value="{{ $xe->bien_so }}">
                    </div>
                    <div class="col-6">
                        <label for="cmnd">CMND</label>
                        <input type="text" disabled class="form-control js_cmnd" id="cmnd" value="{{ auth()->check() ? auth()->user()->cmnd : '' }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="ngayNhanXe">Ngày nhận xe</label>
                    <input type="text" class="form-control js_ngay_nhan_xe" name="ngay_nhan_xe" id="ngayNhanXe" placeholder="Chọn ngày nhận xe">
                </div>
                <div class="form-group">
                    <label for="ngayTraXe">Ngày trả xe</label>
                    <input type="text" class="form-control js_ngay_tra_xe" name="ngay_tra_xe" id="ngayTraXe" placeholder="Chọn ngày trả xe">
                </div>
                <div class="my-3">
                    Số ngày thuê: <strong class="js_so_ngay_thue"></strong>
                </div>
                <div class="my-3">
                    <input type="hidden" class="js_don_gia_hidden" value="{{ $xe->gia_thue }}">
                    Đơn giá/ngày: <strong>{{ number_format($xe->gia_thue) }} đồng</strong>
                </div>
                <div class="my-3">
                    Thành tiền: <strong class="js_thanh_tien"></strong>
                </div>
                <div class="d-flex flex-row justify-content-lg-between">
                    <button type="button" class="btn btn-outline-secondary"><i class="fas fa-sync-alt"></i></button>
                    @if (auth()->check())
                        <button type="button" class="btn btn-primary js_btn_dat_xe">Đặt</button>
                    @else
                        <span>Vui lòng <a href="dang-nhap" class="text-primary mx-1">Đăng nhập</a> để đặt xe</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="js_modal_xac_nhan" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalXacNhan" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalXacNhan">Xác nhận thuê xe <span class="js_ten_xe"></span></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 my-2">
                            <div>Tên xe <strong class="js_ten_xe_md"></strong></div>
                        </div>
                        <div class="col-6 my-2">
                            <div>Loại xe <strong class="js_loai_xe_md"></strong></div>
                        </div>
                        <div class="col-6 my-2">
                            <div>Biển số <strong class="js_bien_so_md"></strong></div>
                        </div>
                        <div class="col-6 my-2">
                            <div>CMND <strong class="js_cmnd_md"></strong></div>
                        </div>
                        <div class="col-6 my-2">
                            <div>Ngày nhận xe <strong class="js_ngay_nhan_xe_md"></strong></div>
                        </div>
                        <div class="col-6 my-2">
                            <div>Ngày trả xe <strong class="js_ngay_tra_xe_md"></strong></div>
                        </div>
                        <div class="col-6 my-2">
                            <div>Đơn giá <strong class="js_don_gia_md"></strong></div>
                        </div>
                        <div class="col-6 my-2">
                            <div>Số ngày <strong class="js_so_ngay_md"></strong></div>
                        </div>
                        <div class="col-12 my-2">
                            <div class="alert alert-info mb-0" role="alert">
                                <div>Thành tiền <strong class="js_thanh_tien_md"></strong></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex flex-row justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Hủy</button>
                    <button type="button" class="btn btn-success js_btn_xac_nhan"><i class="fas fa-check-circle"></i> Xác nhận</button>
                </div>
            </form>
          </div>
        </div>
    </div>

    <div id="js_modal_thong_bao_success" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="alert alert-success alert-dismissible m-0" role="alert">
                    <strong>Bạn đã đặt thành công!</strong> Vui lòng chờ quản trị viên xác nhận. Cảm ơn!
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="js_modal_thong_bao_error" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="alert alert-danger alert-dismissible m-0" role="alert">
                    <strong>Lỗi!</strong> Có một vài lỗi, xin hãy thử lại!
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('.js_ngay_nhan_xe').datepicker({
                format: 'dd/mm/yyyy',
                weekStart: 1,
                todayHighlight: true,
                startDate: new Date(),
                language: 'vi',
                autoclose : true,
                // datesDisabled: ['25/12/2019', '30/12/2019']
            });
            $('.js_ngay_tra_xe').datepicker({
                format: 'dd/mm/yyyy',
                weekStart: 1,
                todayHighlight: true,
                startDate: new Date(),
                language: 'vi',
                autoclose : true,
                // datesDisabled: ['25/12/2019', '30/12/2019']
            });

            let dateNhan, dateTra, days, thanhTien;
            const donGia = $('.js_don_gia_hidden').val();

            $('.js_ngay_nhan_xe').datepicker()
                .on('changeDate', function(e) {
                    dateNhan = e.date;
                });

            $('.js_ngay_tra_xe').datepicker()
                .on('changeDate', function(e) {
                    dateTra = e.date;
                    days = dateTra.getDate() - dateNhan.getDate();                    
                    thanhTien = days * (+donGia);
                    $('.js_so_ngay_thue').html(`${days} ngày`);
                    $('.js_thanh_tien').html(`${thanhTien.toLocaleString("en")} đồng`);
                    // console.log(days);
                });
            $('.js_btn_dat_xe').click(function (e) { 
                e.preventDefault();
                let tenXe = $('.js_ten_xe').html();
                let tenLoaiXe = $('.js_ten_loai_xe').html();
                let bienSo = $('.js_bien_so').val();
                let cmnd = $('.js_cmnd').val();
                let ngayNhanXe = $('.js_ngay_nhan_xe').val();
                let ngayTraXe = $('.js_ngay_tra_xe').val();
                let donGia = +($('.js_don_gia_hidden').val());

                $('.js_ten_xe_md').html(tenXe);
                $('.js_loai_xe_md').html(tenLoaiXe);
                $('.js_bien_so_md').html(bienSo);
                $('.js_cmnd_md').html(cmnd);
                $('.js_ngay_nhan_xe_md').html(ngayNhanXe);
                $('.js_ngay_tra_xe_md').html(ngayTraXe);
                $('.js_don_gia_md').html(`${donGia.toLocaleString("en")} đồng`);
                $('.js_so_ngay_md').html(days);
                $('.js_thanh_tien_md').html(`${thanhTien.toLocaleString("en")} đồng`);
                
                $('#js_modal_xac_nhan').modal('show');
            });

            $('.js_btn_xac_nhan').click(function (e) { 
                e.preventDefault();
                const data = {
                    'xe_bien_so': $('.js_bien_so').val(),
                    'user_cmnd': $('.js_cmnd').val(),
                    'ngay_nhan_xe': $('.js_ngay_nhan_xe').val(),
                    'ngay_tra_xe': $('.js_ngay_tra_xe').val(),
                    'thanh_tien': thanhTien
                };

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post",
                    url: "xac-nhan-dat-xe",
                    data: {
                        xe_bien_so: data.xe_bien_so,
                        user_cmnd: data.user_cmnd,
                        ngay_nhan_xe: data.ngay_nhan_xe,
                        ngay_tra_xe: data.ngay_tra_xe,
                        thanh_tien: data.thanh_tien,
                    },
                    success: function (response) {
                        if(!response.error) {
                            $('#js_modal_xac_nhan').modal('hide');
                            $('#js_modal_thong_bao_success').modal('show');
                        } else {
                            $('#js_modal_xac_nhan').modal('hide');
                            $('#js_modal_thong_bao_error').modal('show');
                        }
                    }
                })
                .done(function() {})
                .fail(function() {
                    $('#js_modal_xac_nhan').modal('hide');
                    $('#js_modal_thong_bao_error').modal('show');
                })
            });
        });
    </script>
@endpush