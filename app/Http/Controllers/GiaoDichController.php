<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\GiaoDich;

class GiaoDichController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('ajaxDatXe');
    }

    public function index()
    {
        $giaoDichs = GiaoDich::with('user', 'xe')->orderBy('tinh_trang', 'asc')->latest()->get();

        return view('admin.giaodich.index', compact('giaoDichs'));
    }

    public function create()
    {
        return view('admin.giaodich.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $giaoDich = GiaoDich::where('id', $id)->firstOrFail();
        $giaoDich->delete();

        return back()->with(['thong-bao' => 'Xóa thành công giao dịch!', 'type' => 'success']);
    }

    public function ajaxDatXe(Request $request)
    {
        $ngayNhanXe = DateTime::createFromFormat('d/m/Y', $request->ngay_nhan_xe)->format('Y-m-d');
        $ngayTraXe = DateTime::createFromFormat('d/m/Y', $request->ngay_tra_xe)->format('Y-m-d');

        try {
            GiaoDich::create([
                'xe_bien_so' => $request->xe_bien_so,
                'user_cmnd' => $request->user_cmnd,
                'ngay_nhan_xe' => $ngayNhanXe,
                'ngay_tra_xe' => $ngayTraXe,
                'thanh_tien' => $request->thanh_tien,
            ]);

            return response()->json([
                'error' => false
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function updateTinhTrang(Request $request)
    {
        try {
            $giaoDich = GiaoDich::where('id', $request->id)->firstOrFail();
            $giaoDich->update(['tinh_trang' => $request->tinh_trang]);

            return response()->json([
                'error' => false
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }
}
