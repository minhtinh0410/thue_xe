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
                        <h5 class="card-title">Danh sách giao dịch <span class="text-muted">({{ $giaoDichs->count() }} giao dịch)</span></h5>
                    </div>    
                    <div>
                        <a href="{{ route('giao-dich.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Thêm</a>
                    </div>    
                </div>
                <table id="myTable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Biển số</th>
                        <th scope="col">CMND</th>
                        <th scope="col">Ngày nhận xe</th>
                        <th scope="col">Ngày trả xe</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Tình trạng</th>
                        <th scope="col">Duyệt</th>
                        <th scope="col" class="text-center">Tùy chọn</th>
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
                            <td>{{ $giaoDich->user_cmnd }}</td>
                            <td>{{ date('d/m/Y', strtotime($giaoDich->ngay_nhan_xe)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($giaoDich->ngay_tra_xe)) }}</td>
                            <td>{{ number_format($giaoDich->thanh_tien) }} đồng</td>
                            <td>{{ $giaoDich->tinh_trang == 0 ? 'Chưa duyệt' : 'Đã duyệt' }}</td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" {{ $giaoDich->tinh_trang == 0 ? '' : 'checked' }} giaodich-id="{{ $giaoDich->id }}" class="custom-control-input js_checkbox_tinhtrang" id="checkBox_{{ $giaoDich->id }}">
                                    <label class="custom-control-label" for="checkBox_{{ $giaoDich->id }}"></label>
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('giao-dich.edit', $giaoDich->id) }}" class="text-primary mr-3">Cập nhật</a>
                                <a href="#" class="text-danger js_btn_xoa_giao_dich" giaodich-id="{{ $giaoDich->id }}">Xóa</a>
                                <form id="js_form_xoa_giao_dich_{{ $giaoDich->id }}" action="{{ route('giao-dich.destroy', $giaoDich->id) }}" method="POST">
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
            $('body').on('change', '.js_checkbox_tinhtrang', function (e) {
                e.preventDefault();
                let checked = $(this).prop('checked');
                let giaoDichId = $(this).attr('giaodich-id')
                let tinhTrang;
                (checked) ? tinhTrang = 1 : tinhTrang = 0;

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post",
                    url: "admin/update-tinh-trang-giao-dich",
                    data: { id: giaoDichId, tinh_trang : tinhTrang },
                    success: function (response) {
                        console.log(response);
                    }
                });
            });

            $('body').on('click', '.js_btn_xoa_giao_dich', function (e) {
                e.preventDefault();
                let id = $(this).attr('giaodich-id');
                if(confirm('Bạn có chắc chắn?')) {
                    $(`#js_form_xoa_giao_dich_${id}`).submit();
                }
            });
        });
    </script>
@endsection