<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Xe;
use App\LoaiXe;
use App\GiaoDich;

class PageController extends Controller
{
    public function getHome()
    {
        $xes = Xe::with('loaiXe')->orderBy('gia_thue', 'desc')->take(6)->get();

        // return view('pages.trang-chu', ['xes' => $xes]);
        return view('pages.trang-chu', compact('xes'));
    }

    public function getDangNhap()
    {
        return view('pages.dang-nhap');
    }

    public function getDangKy()
    {
        return view('pages.dang-ky');
    }

    public function getTrangCaNhan()
    {
        $khachHang = auth()->user();
        $giaoDichs = GiaoDich::with('xe', 'user')
            ->where('user_cmnd', $khachHang->cmnd)
            ->where('tinh_trang', 1)
            ->latest()
            ->get();

        return view('pages.trang-ca-nhan', compact('khachHang', 'giaoDichs'));
    }

    public function getThueXe()
    {
        $xes = Xe::with('loaiXe')->latest()->paginate(6);
        $loaiXes = LoaiXe::all();

        return view('pages.thue-xe', compact('xes', 'loaiXes'));
    }
}
