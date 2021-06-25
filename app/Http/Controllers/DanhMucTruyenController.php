<?php

namespace App\Http\Controllers;

use App\Models\DanhMucTruyen;
use Illuminate\Http\Request;

class DanhMucTruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $danhmuctruyen = DanhMucTruyen::all(); // lấy hết
        // lấy theo phương thức orderBy sắp xếp theo DESC 
        $danhmuctruyen = DanhMucTruyen::orderBy('id', 'DESC')->get();
        // trả dữ liệu về trang index
        return view('admin.danhmuctruyen.index')->with(compact('danhmuctruyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.danhmuctruyen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate dữ liệu
        $data = $request->validate(
            [
                'tendanhmuc' => 'required|max:255|unique:danhmuc',
                'slug_danhmuc' => 'required|max:255|unique:danhmuc',
                'mota' => 'required|max:255',
                'kichhoat' => 'required',

            ],
            [
                'slug_danhmuc.unique' => 'slug danh mục đã tồn tại',
                'tendanhmuc.required' => 'Tên danh mục phải có',
                'mota.required' => 'Mô tả phải có',
                'tendanhmuc.unique' => 'tên danh mục đã tồn tại',
            ]
        );
        // tao đối tượng danh muc truyện từ model danhmuctruyen
        $danhmuctruyen = new DanhMucTruyen();
        $danhmuctruyen->tendanhmuc = $data['tendanhmuc'];
        $danhmuctruyen->slug_danhmuc=$data['slug_danhmuc'];
        $danhmuctruyen->mota = $data['mota'];
        $danhmuctruyen->kichhoat = $data['kichhoat'];
        $danhmuctruyen->save();
        // trả về trang vừa gửi dữ liệu kèm thông báo 
        return redirect()->back()->with('status', 'thêm danh mục truyện thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $danhmuc = DanhMucTruyen::find($id);

        return view('admin.danhmuctruyen.edit')->with(compact('danhmuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->validate(
            [
                'tendanhmuc' => 'required|max:255',
                'mota' => 'required|max:255',
                'kichhoat' => 'required',
                'slug_danhmuc'=>'required|max:255',

            ],
            [
                'tendanhmuc.required' => 'Tên danh mục phải có',
                'slug_danhmuc.required' => 'slug danh mục phải có',

                'mota.required' => 'Mô tả phải có',
            ]
        );
        // tao đối tượng danh muc truyện từ model danhmuctruyen
        $danhmuctruyen = DanhMucTruyen::find($id);
        $danhmuctruyen->slug_danhmuc=$data['slug_danhmuc'];
        $danhmuctruyen->tendanhmuc = $data['tendanhmuc'];
        $danhmuctruyen->mota = $data['mota'];
        $danhmuctruyen->kichhoat = $data['kichhoat'];
        // echo $danhmuctruyen; exit;
        $danhmuctruyen->save();
        return redirect()->back()->with('status', 'Cập nhật thành cong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // DanhMucTruyen::find($id)->delete();
        // return redirect()->back()->with('status','Xoá thành công');

    }
}
