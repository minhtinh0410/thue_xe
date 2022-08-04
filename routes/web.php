<?php

Route::get('/', 'PageController@getHome');

Route::get('dang-nhap', 'PageController@getDangNhap');
Route::post('dang-nhap', 'AuthController@postDangNhap')->name('auth.dang-nhap');

Route::get('dang-ky', 'PageController@getDangKy');
Route::post('dang-ky', 'AuthController@postDangKy')->name('auth.dang-ky');

Route::post('cap-nhat-profile', 'AuthController@updateProfile')->name('auth.update');

Route::post('dang-xuat', 'AuthController@postDangXuat')->name('auth.dang-xuat');

Route::get('trang-ca-nhan', 'PageController@getTrangCaNhan')->middleware('user');

Route::get('thue-xe', 'PageController@getThueXe');

Route::get('tim-kiem', 'XeController@timKiem');

Route::post('xac-nhan-dat-xe', 'GiaoDichController@ajaxDatXe');

Route::get('chi-tiet-xe/{id}', 'XeController@show');

//admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('thong-ke', 'PageAdminController@getThongKe');
    Route::resources([
        'khach-hang' => 'TaiKhoanController',
        'xe' => 'XeController',
        'giao-dich' => 'GiaoDichController'
    ]);
    Route::post('update-tinh-trang-giao-dich', 'GiaoDichController@updateTinhTrang');
    Route::get('get-bien-so-xe', 'XeController@getBienSoXe');
});
