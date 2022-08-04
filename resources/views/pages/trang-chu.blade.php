@extends('layouts.index')

@section('content')
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner rounded-lg shadow border-0">
        <div class="carousel-item active">
            <img src="/upload/slides/slide-1.jpg" class="d-block w-100" alt="slide1">
        </div>
        <div class="carousel-item">
            <img src="/upload/slides/slide-2.jpg" class="d-block w-100" alt="slide2">
        </div>
        <div class="carousel-item">
            <img src="/upload/slides/slide-3.jpg" class="d-block w-100" alt="slide3">
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="row mt-4">
    <div class="col-12 my-3">
        <h4 class="text-center text-uppercase lead display-4">Xe tốt nhất</h4>
    </div>
    @foreach ($xes as $xe)
    <div class="col-md-4 mb-4">
        <div class="card shadow rounded-lg border-0 overflow-hidden">
            <a href="{{ url('chi-tiet-xe', $xe->id) }}">
                <img src="upload/xes/{{ $xe->hinh }}" class="card-img-top" alt="{{ $xe->ten_xe }}">
            </a>
            <div class="card-body">
                <a href="{{ url('chi-tiet-xe', $xe->id) }}" class="text-dark text-decoration-none">
                    <h5 class="card-title pb-3 pt-0">Xe {{ $xe->ten_xe }}</h5>
                </a>
                <div class="d-flex flex-row justify-content-between">
                    <div class="card-text">Loại xe <span class="font-weight-bold">{{ $xe->loaiXe->ten_loai_xe }}</></div>
                    <div class="card-text">Giá thuê <span class="text-primary">{{ number_format($xe->gia_thue) }} đồng</span></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="col-12 text-center mt-4">
        <a href="/thue-xe" class="btn btn-outline-secondary">Xem thêm</a>
    </div>
</div>
@endsection