<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use App\User;
use DateTime;

class AuthController extends Controller
{
    public function postDangKy(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'email'=>'unique:users|min:3|max:255',
                'password'=>'confirmed|min:6|max:255',
                'ho_ten'=>'min:3|max:255',
                'cmnd'=>'unique:users|min:7|max:11',
                'so_dien_thoai'=>'min:3|max:10',
                'dia_chi'=>'min:3|max:255',
            ],
            [
                'email.unique'=>'Email này đã có người sử dụng',
                'email.min'=>'Email ít nhất :min ký tự',
                'email.max'=>'Email nhiều nhất :max ký tự',
                'password.confirmed'=>'Nhập lại mật khẩu chưa đúng',
                'password.min'=>'Mật khẩu ít nhất :min ký tự',
                'password.max'=>'Mật khẩu nhiều nhất :max ký tự',
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

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'ho_ten' => $request->ho_ten,
            'cmnd' => $request->cmnd,
            'ngay_sinh' => $dateFormat,
            'so_dien_thoai' => $request->so_dien_thoai,
            'dia_chi' => $request->dia_chi,
            'quyen_id' => 2,
        ]);

        return back()->with(['thong-bao' => 'Đăng ký thành công!', 'type' => 'success']);
    }

    public function postDangNhap(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'email'=>'min:3|max:255',
                'password'=>'min:6|max:255',
            ],
            [
                'email.min'=>'Email ít nhất :min ký tự',
                'email.max'=>'Email nhiều nhất :max ký tự',
                'password.min'=>'Mật khẩu ít nhất :min ký tự',
                'password.max'=>'Mật khẩu nhiều nhất :max ký tự',
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()->with(['error_register'=>'Loi dang nhap']);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect()->intended();
        }
        else
            return back()->with(['thong-bao'=>'Email hoặc mật khẩu không chính xác!', 'type'=>'danger']);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $dateFormat = DateTime::createFromFormat('d/m/Y', $request->ngay_sinh)->format('Y-m-d');

        $user->update([
            'ho_ten' => $request->ho_ten,
            'ngay_sinh' => $dateFormat,
            'so_dien_thoai' => $request->so_dien_thoai,
            'dia_chi' => $request->dia_chi
        ]);

        return back()->with(['thong-bao' => 'Cập nhật thông tin thành công!', 'type' => 'success']);
    }

    public function postDangXuat()
    {
        Auth::logout();

        return back();
    }
}
