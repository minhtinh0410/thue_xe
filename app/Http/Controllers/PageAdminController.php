<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Xe;
use App\GiaoDich;
use DB;

class PageAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only('getThongKe');
    }
    
    public function getThongKe()
    {
        $totalKhachHang = User::where('quyen_id', 2)->count();
        $totalXe = Xe::count();
        $totalMoney = DB::table('giao_dichs')
            ->where('tinh_trang', 1)
            ->select(DB::raw('SUM(thanh_tien) as total_money'))
            ->get();

        $topXes = DB::table('xes')
            ->join('giao_dichs', 'giao_dichs.xe_bien_so', '=', 'xes.bien_so')
            ->select('xes.id', 'xes.ten_xe', DB::raw('COUNT(*) as times'))
            ->where('giao_dichs.tinh_trang', 1)
            ->groupBy('xes.id', 'xes.ten_xe')
            ->orderBy('times', 'desc')
            ->take(5)
            ->get();

        $giaoDichTodays = GiaoDich::with('user', 'xe')
            ->where('tinh_trang', 1)
            ->whereDate('created_at', date('Y-m-d'))
            ->latest()
            ->get();

        return view('admin.thong-ke', compact('totalKhachHang', 'totalXe', 'totalMoney', 'topXes', 'giaoDichTodays'));
    }
}
