<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\DanhMucTruyen;
use App\Models\Truyen;
use App\Models\TheLoai;


class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $truyen = Truyen::with('danhmuctruyen','theloai')->orderBy('id', 'DESC')->get();
        // dd($truyen);
        return view('admin.truyen.index')->with(compact('truyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $theloai = TheLoai::orderBy('id','DESC')->get();
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();
        return view('admin.truyen.create')->with(compact('danhmuc','theloai'));
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
                'tentruyen' => 'required|max:255|unique:truyen',
                'tomtat' => 'required|max:255',
                'kichhoat' => 'required',
                'tacgia' => 'required',
                'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048
                |dimensions:min_width:100,min_height:100,max_height:1000,max_width:1000',
                'slug_truyen' => 'required|max:255|unique:truyen',
                'danhmuc_id' => 'required',
                'theloai' => 'required',
                'tukhoa' => 'required',
                'luotxem' => 'required',
                'truyennoibat'=>'required'
            ],
            [
                'tentruyen.required' => 'Tên truyen phải có',
                'slug_truyen.required' => 'slug truyen phải có',
                'slug_truyen.unique' => 'slug đã có',
                'tacgia.required' => 'phải có tác giả truyện',
                'tentruyen.unique' => 'Tên truyen đã có',
                'tomtat.required' => 'chưa có tóm tắt phải có',
                'hinhanh.required' => 'hình ảnh phải có',
            ]
        );
        // tao đối tượng danh muc truyện từ model danhmuctruyen
        $truyen = new Truyen();
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->theloai_id = $data['theloai'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->tukhoa = $data['tukhoa'];
        $truyen->luotxem = $data['luotxem'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->truyennoibat = $data['truyennoibat'];
        $truyen->danhmuc_id = $data['danhmuc_id'];
        $truyen->created_at =Carbon::now('Asia/Ho_Chi_Minh');
      
        //  thheem ảnh vào folder
        $get_image = $request->hinhanh;
        $path = 'public/uploads/truyen/';
        // getClientOriginalName() lấy tên ảnh và  đuôi mở rộng
        $get_name_image = $get_image->getClientOriginalName();
        //  tách tên và đuôi bởi dấu chấm
        $name_image = current(explode('.', $get_name_image));
        // tạo tên mới nối với random 0-99
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $truyen->hinhanh = $new_image;
        $truyen->save();
        return redirect()->back()->with('status', 'thêm truyện thành cong');
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
        $theloai = TheLoai::orderBy('id','DESC')->get();
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();
        $truyen = Truyen::find($id);
        return view('admin.truyen.edit')->with(compact('truyen', 'danhmuc','theloai'));
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
                'tentruyen' => 'required|max:255',
                'tomtat' => 'required|max:255',
                'kichhoat' => 'required',
                'tacgia' => 'required',
                'slug_truyen' => 'required|max:255',
                'danhmuc_id' => 'required',
                'theloai' => 'required',
                'tukhoa' => 'required',
                'luotxem' => 'required',
                'truyennoibat' => 'required'
            ],
            [
                'tentruyen.required' => 'Tên truyen phải có',
                // 'slug_truyen.required' => 'slug truyen phải có',
                // 'slug_truyen.unique' => 'slug đã có',
                'tacgia.required' => 'phải có tác giả truyện',
                'tentruyen.unique' => 'Tên truyen đã có',
                'tomtat.required' => 'chưa có tóm tắt phải có',
                
            ]
        );
        // tao đối tượng danh muc truyện từ model danhmuctruyen
            $truyen = Truyen::find($id);
            $truyen->slug_truyen = $data['slug_truyen'];
            $truyen->tentruyen = $data['tentruyen'];
            $truyen->theloai_id = $data['theloai'];
            $truyen->tukhoa = $data['tukhoa'];
            $truyen->luotxem = $data['luotxem'];
            $truyen->tacgia = $data['tacgia'];
            $truyen->tomtat = $data['tomtat'];
            $truyen->kichhoat = $data['kichhoat'];
            $truyen->truyennoibat = $data['truyennoibat'];
            $truyen->danhmuc_id = $data['danhmuc_id'];
              $truyen->updated_at =Carbon::now('Asia/Ho_Chi_Minh');
            //  thheem ảnh vào folder
            $get_image = $request->hinhanh;
            if($get_image){
                $path = 'public/uploads/truyen/' . $truyen->hinhanh;
                // nếu tồn tại ảnh trong đường dẫn thì unlink
                if (file_exists($path)) {
                    unlink($path);
                }
                $path = 'public/uploads/truyen/';
                // getClientOriginalName() lấy tên ảnh và  đuôi mở rộng
                $get_name_image = $get_image->getClientOriginalName();
                //  tách tên và đuôi bởi dấu chấm
                $name_image = current(explode('.', $get_name_image));
                // tạo tên mới nối với random 0-99
                $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move($path, $new_image);
                $truyen->hinhanh = $new_image;
            }
           
            $truyen->save();
            // trả về trang trước
            // return redirect()->back()->with('status', 'cập nhật truyện thành cong');
            // trả về route truyện
            return redirect('/truyen')->with('status', 'cập nhật truyện thành cong');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // tìm id
        $truyen =  Truyen::find($id);
        // đường dẫn
        $path = 'public/uploads/truyen/' . $truyen->hinhanh;
        // nếu tồn tại ảnh trong đường dẫn thì unlink
        if (file_exists($path)) {
            unlink($path);
        }
        Truyen::find($id)->delete();
        return redirect()->back()->with('status', 'xoá thành cong');
    }

    public function truyennoibatajax(Request $request)
    {
        $data= $request->all();
        $truyen = Truyen::find($data['truyen_id']);
        $truyen->truyennoibat = $data['truyennoibat'];
        $truyen ->save();
    }
}
