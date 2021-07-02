<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;
use Carbon\Carbon;
class SachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sach = Sach::orderBy('id', 'DESC')->get();   
        return view('admin.sach.index')->with(compact('sach')); 
    }     


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.sach.create');
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
                'tensach' => 'required|max:255|unique:sach',
                'tomtat' => 'required|max:255',
                'kichhoat' => 'required',
                'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048
                |dimensions:min_width:100,min_height:100,max_height:1000,max_width:1000',
                'slug_sach' => 'required|max:255|unique:sach',               
                'tukhoa' => 'required',
                'luotxem' => 'required',
                'noidung' => 'required',
                
            ],
            [
                'tensach.required' => 'Tên sach phải có',
                'slug_sach.required' => 'slug sach phải có',
                'slug_sach.unique' => 'slug đã có',

                'tensach.unique' => 'Tên sach đã có',
                'tomtat.required' => 'chưa có tóm tắt phải có',
                'hinhanh.required' => 'hình ảnh phải có',
                'noidung.required' => 'nội dung phải có',
            ]
        );
        // tao đối tượng danh muc truyện từ model danhmucsach
        $sach = new sach();
        $sach->slug_sach = $data['slug_sach'];
        $sach->tensach = $data['tensach']; 
        $sach->tukhoa = $data['tukhoa'];
        $sach->luotxem = $data['luotxem'];
        $sach->tomtat = $data['tomtat'];
        $sach->noidung = $data['noidung'];
        $sach->kichhoat = $data['kichhoat'];
        $sach->created_at =Carbon::now('Asia/Ho_Chi_Minh');
      
        //  thheem ảnh vào folder
        $get_image = $request->hinhanh;
        $path = 'public/uploads/sach/';
        // getClientOriginalName() lấy tên ảnh và  đuôi mở rộng
        $get_name_image = $get_image->getClientOriginalName();
        //  tách tên và đuôi bởi dấu chấm
        $name_image = current(explode('.', $get_name_image));
        // tạo tên mới nối với random 0-99
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $sach->hinhanh = $new_image;
        $sach->save();
        return redirect()->back()->with('status', 'thêm sách thành cong');
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
        $sach = Sach::find($id);
        return view('admin.sach.edit')->with(compact('sach'));
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
                'tensach' => 'required|max:255',
                'tomtat' => 'required|max:255',
                'kichhoat' => 'required',
                'slug_sach' => 'required|max:255',               
                'tukhoa' => 'required',
                'luotxem' => 'required',
                'noidung' => 'required',
                
            ],
            [
                'tensach.required' => 'Tên sach phải có',
                'slug_sach.required' => 'slug sach phải có',
                'slug_sach.unique' => 'slug đã có',
               
                'tensach.unique' => 'Tên sach đã có',
                'tomtat.required' => 'chưa có tóm tắt phải có',
        
                'noidung.required' => 'nội dung phải có',
            ]
        );
        // tao đối tượng danh muc truyện từ model danhmucsach
        $sach = Sach::find($id);
        $sach->slug_sach = $data['slug_sach'];
        $sach->tensach = $data['tensach']; 
        $sach->tukhoa = $data['tukhoa'];
        $sach->luotxem = $data['luotxem'];
        $sach->tomtat = $data['tomtat'];
        $sach->noidung = $data['noidung'];
        $sach->kichhoat = $data['kichhoat'];
        $sach->updated_at =Carbon::now('Asia/Ho_Chi_Minh');
      
        //  thheem ảnh vào folder
        $get_image = $request->hinhanh;
        if($get_image){
            $path = 'public/uploads/sach/' . $sach->hinhanh;
            // nếu tồn tại ảnh trong đường dẫn thì unlink
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'public/uploads/sach/';
            // getClientOriginalName() lấy tên ảnh và  đuôi mở rộng
            $get_name_image = $get_image->getClientOriginalName();
            //  tách tên và đuôi bởi dấu chấm
            $name_image = current(explode('.', $get_name_image));
            // tạo tên mới nối với random 0-99
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $sach->hinhanh = $new_image;
        }
       
        $sach->save();
        return redirect('/sach')->with('status', 'cập nhật sách thành công');
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
         // tìm id
         $sach =  Sach::find($id);
         // đường dẫn
         $path = 'public/uploads/sach/' . $sach->hinhanh;
         // nếu tồn tại ảnh trong đường dẫn thì unlink
         if (file_exists($path)) {
             unlink($path);
         }
         Sach::find($id)->delete();
         return redirect()->back()->with('status', 'xoá thành cong');
    }
}
