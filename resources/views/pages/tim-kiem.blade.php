@extends('layouts.index')

@section('content')
<div class="row">
    <div class="col-12 mt-3 mb-2">
        <h3 class="text-center">Tìm kiếm với từ khóa: <small>{{ $query == null ? 'trống' : $query }} ({{ $xes->count() }} kết quả)</small></h3>
    </div>
    @foreach ($xes as $xe)
    <div class="col-md-4 mb-4">
        <div class="card shadow rounded-lg border-0 overflow-hidden">
            <a href="{{ url('chi-tiet-xe', $xe->id) }}">
                <img src="upload/xes/{{ $xe->hinh }}" class="card-img-top" alt="{{ $xe->ten_xe }}">
            </a>
            <div class="card-body">
                <a href="{{ url('chi-tiet-xe', $xe->id) }}" class="text-dark text-decoration-none">
                    <h5 class="card-title pb-3 pt-0">Xe {{ $xe->ten_xe }} <small>({{ $xe->bien_so }})</small></h5>
                </a>
                <div class="d-flex flex-row justify-content-between">
                    <div class="card-text">Loại xe <span class="font-weight-bold">{{ $xe->loaiXe->ten_loai_xe }}</></div>
                    <div class="card-text">Giá thuê <span class="text-primary">{{ number_format($xe->gia_thue) }} đồng</span></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="col-12 mt-4">
        <div class="pagination justify-content-center">
            {{ $xes->links() }}
        </div>
    </div>
</div>
@endsection