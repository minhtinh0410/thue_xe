<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Validator;
use App\LoaiXe;
use App\Xe;

class XeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except(['show', 'timKiem']);
    }

    public function index()
    {
        $xes = Xe::with('loaiXe')->latest()->get();
        
        return view('admin.xe.index', compact('xes'));
    }

    public function create()
    {
        $loaiXes = LoaiXe::all();

        return view('admin.xe.create', compact('loaiXes'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'loaixe_id'=>'required',
                'ten_xe'=>'min:3|max:255',
                'bien_so'=>'unique:xes|min:3|max:15',
                'hinh'=>'required|file|image|max:2048',
            ],
            [
                'loaixe_id.required'=>'Chưa chọn loại xe',
                'ten_xe.min'=>'Tên xe ít nhất :min ký tự',
                'ten_xe.max'=>'Tên xe nhiều nhất :max ký tự',
                'bien_so.unique'=>'Biển số xe đã tồn tại',
                'bien_so.min'=>'Biển số xe ít nhất :min ký tự',
                'bien_so.max'=>'Biển số xe nhiều nhất :max ký tự',
                'hinh.required'=>'Chưa chọn hình',
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()->with(['error_register'=>'Loi them']);
        }

        $data = $request->all();

        if($request->hasFile('hinh')) {
            $hinh = $request->file('hinh');
            $imageName = str_random(15) . '.'. $hinh->getClientOriginalExtension();
            $data['hinh'] = $imageName;

            Image::make($hinh)->fit(600, 300)->save(public_path('upload/xes/' . $imageName));            
        }

        $xe = Xe::create($data);

        return back()->with(['thong-bao' => 'Thêm xe ' . $xe->ten_xe . ' thành công!', 'type' => 'success']);
    }

    public function show($id)
    {
        $xe = Xe::with('loaiXe')->where('id', $id)->firstOrFail();

        return view('pages.chi-tiet-xe', compact('xe'));
    }

    public function edit($id)
    {
        $xe = Xe::findOrFail($id);
        $loaiXes = LoaiXe::all();

        return view('admin.xe.edit', compact('xe', 'loaiXes'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                'loaixe_id'=>'required',
                'ten_xe'=>'min:3|max:255',
                'hinh'=>'sometimes|file|image|max:2048',
            ],
            [
                'loaixe_id.required'=>'Chưa chọn loại xe',
                'ten_xe.min'=>'Tên xe ít nhất :min ký tự',
                'ten_xe.max'=>'Tên xe nhiều nhất :max ký tự'
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()->with(['error_register'=>'Loi cap nhat']);
        }

        $data = $request->all();

        if($request->hasFile('hinh')) {
            $hinh = $request->file('hinh');
            $imageName = str_random(15) . '.'. $hinh->getClientOriginalExtension();
            $data['hinh'] = $imageName;

            Image::make($hinh)->fit(600, 300)->save(public_path('upload/xes/' . $imageName));            
        }

        $xe = Xe::findOrFail($id);
        $xe->update($data);

        return redirect('admin/xe')->with(['thong-bao' => 'Cập nhật xe ' . $xe->ten_xe . ' thành công!', 'type' => 'success']);
    }

    public function destroy($id)
    {
        $xe = Xe::findOrFail($id);
        $xe->delete();

        return back()->with(['thong-bao' => 'Xóa xe ' . $xe->ten_xe . ' thành công!', 'type' => 'success']);
    }

    public function getBienSoXe()
    {
        $bienSoXe = Xe::select('bien_so')->get();

        return $bienSoXe;
    }

    public function timKiem(Request $request)
    {
        $query = $request->q;
        if($query) {
            $xes = Xe::with('loaiXe')
                ->where('ten_xe', 'LIKE', '%' . $query . '%')
                ->orWhere('bien_so', 'LIKE', '%' . $query . '%')
                ->latest()
                ->paginate(6);
        } else {
            $xes = Xe::with('loaiXe')->latest()->paginate(6);
        }

        return view('pages.tim-kiem', compact('xes', 'query'));
    }
}
