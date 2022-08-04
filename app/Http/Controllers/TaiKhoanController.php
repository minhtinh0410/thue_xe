<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DateTime;
use Hash;
use App\Quyen;
use App\User;

class TaiKhoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $khachHangs = User::where('quyen_id', 2)->with('quyen')->latest()->get();

        return view('admin.khachhang.index', compact('khachHangs'));
    }

    public function create()
    {
        return view('admin.khachhang.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'email'=>'unique:users|min:3|max:255',
                'ho_ten'=>'min:3|max:255',
                'cmnd'=>'unique:users|min:7|max:11',
                'so_dien_thoai'=>'min:3|max:10',
                'dia_chi'=>'min:3|max:255',
            ],
            [
                'email.unique'=>'Email này đã có người sử dụng',
                'email.min'=>'Email ít nhất :min ký tự',
                'email.max'=>'Email nhiều nhất :max ký tự',
                'ho_ten.min'=>'Họ tên ít nhất :min ký tự',
                'ho_ten.max'=>'Họ tên nhiều nhất :max ký tự',
                'cmnd.unique'=>'CMND này đã tồn tại',
                'cmnd.min'=>'CMND ít nhất :min ký tự',
                'cmnd.max'=>'CMND nhiều nhất :max ký tự',
                'so_dien_thoai.min'=>'Số điện thoại ít nhất :min ký tự',
                'so_dien_thoai.max'=>'Số điện thoại nhiều nhất :max ký tự',
                'dia_chi.min'=>'Địa chỉ ít nhất :min ký tự',
                'dia_chi.max'=>'Địa chỉ nhiều nhất :max ký tự',
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()->with(['error_register'=>'Loi dang ky']);
        }

        $dateFormat = DateTime::createFromFormat('d/m/Y', $request->ngay_sinh)->format('Y-m-d');
        $passwordDefault = 123456;

        $khachHang = User::create([
            'email' => $request->email,
            'password' => Hash::make($passwordDefault),
            'ho_ten' => $request->ho_ten,
            'cmnd' => $request->cmnd,
            'ngay_sinh' => $dateFormat,
            'so_dien_thoai' => $request->so_dien_thoai,
            'dia_chi' => $request->dia_chi,
            'quyen_id' => 2,
        ]);

        return back()->with(['thong-bao' => 'Thêm khách hàng ' . $khachHang->ho_ten . ' thành công!', 'type' => 'success']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $khachHang = User::findOrFail($id);

        return view('admin.khachhang.edit', compact('khachHang'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'ho_ten'=>'min:3|max:255',
                'cmnd'=>'unique:users|min:7|max:11',
                'so_dien_thoai'=>'min:3|max:10',
                'dia_chi'=>'min:3|max:255',
            ],
            [
                'ho_ten.min'=>'Họ tên ít nhất :min ký tự',
                'ho_ten.max'=>'Họ tên nhiều nhất :max ký tự',
                'cmnd.unique'=>'CMND này đã tồn tại',
                'cmnd.min'=>'CMND ít nhất :min ký tự',
                'cmnd.max'=>'CMND nhiều nhất :max ký tự',
                'so_dien_thoai.min'=>'Số điện thoại ít nhất :min ký tự',
                'so_dien_thoai.max'=>'Số điện thoại nhiều nhất :max ký tự',
                'dia_chi.min'=>'Địa chỉ ít nhất :min ký tự',
                'dia_chi.max'=>'Địa chỉ nhiều nhất :max ký tự',
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()->with(['error_register'=>'Loi dang ky']);
        }

        $dateFormat = DateTime::createFromFormat('d/m/Y', $request->ngay_sinh)->format('Y-m-d');

        $khachHang = User::findOrFail($id);

        $khachHang->update([
            'ho_ten' => $request->ho_ten,
            'ngay_sinh' => $dateFormat,
            'so_dien_thoai' => $request->so_dien_thoai,
            'dia_chi' => $request->dia_chi
        ]);

        return redirect('admin/khach-hang')->with(['thong-bao' => 'Cập nhật khách hàng ' . $khachHang->ho_ten . ' thành công!', 'type' => 'success']);
    }

    public function destroy($id)
    {
        $khachHang = User::findOrFail($id);
        $khachHang->delete();

        return back()->with(['thong-bao' => 'Xóa khách hàng ' . $khachHang->ho_ten . ' thành công!', 'type' => 'success']);
    }
}
