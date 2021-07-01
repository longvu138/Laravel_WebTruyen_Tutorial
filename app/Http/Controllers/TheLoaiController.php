<?php

namespace App\Http\Controllers;

use App\Models\TheLoai;
use Illuminate\Http\Request;

class theloaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $theloai = TheLoai::orderBy('id', 'DESC')->get();
        
        // trả dữ liệu về trang index
        return view('admin.theloai.index')->with(compact('theloai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.theloai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate(
            [
                'tentheloai' => 'required|max:255|unique:theloai',
                'slug_theloai' => 'required|max:255|unique:theloai',
                'mota' => 'required|max:255',

            ],
            [
                'tentheloai.unique' => 'tên thể loại đã tồn tại',
                'slug_theloai.required' => 'Tên danh mục phải có',
                'mota.required' => 'Mô tả phải có',
                
            ]
        );
        // tao đối tượng danh muc truyện từ model danhmuctruyen
        $theloai = new TheLoai();
        $theloai->tentheloai = $data['tentheloai'];
        $theloai->slug_theloai=$data['slug_theloai'];
        $theloai->mota = $data['mota'];
        // dd($theloai);
        $theloai->save();
        // trả về trang vừa gửi dữ liệu kèm thông báo 
        return redirect()->back()->with('status', 'thêm thể loại truyện thành công');
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
    }
}
