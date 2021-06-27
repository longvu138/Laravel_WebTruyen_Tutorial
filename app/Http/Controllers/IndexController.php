<?php

namespace App\Http\Controllers;

use App\Models\chapter;
use Illuminate\Http\Request;
use App\Models\DanhMucTruyen;
use App\Models\Truyen;

class IndexController extends Controller
{
    //
    public function home()
    {
        //  lấy tất cả các danh mục truyện sắp xếp theo id từ DESC là gì đéo nhớ
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();
        // Lấy tất cả các truyện theo id sắp xếp theo DESC điều kiện có kích hoạt là 1 
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 1)->get();
        // gửi ra trang home trong thư mục pages tất cả data từ danhmuc và truyen
        return view('pages.home')->with(compact('danhmuc', 'truyen'));
        # code...
    }

    public function danhmuc($slug)
    {
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();
        // lấy id theo slug truyền qua lấy 1 bản ghi
        $danhmuc_id= DanhMucTruyen::where('slug_danhmuc',$slug)->first();
        // lấy danh sách truyện theo id sắp xếp desc điuef kiện kích hoạt = 1 và danhmuc_id bằng iddanhmuc
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 1)->where('danhmuc_id',$danhmuc_id->id)->get();
        return view('pages.danhmuc')->with(compact('danhmuc','truyen'));
    }

    public function xemtruyen($slug)
    {
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();
        // lấy truyện với danhmuctruyen có slug bằng slug truyền vào và  kích hoạt bằng 1
        $truyen= Truyen::with('danhmuctruyen')->where('slug_truyen',$slug)->where('kichhoat',1)->first();
        // 
        $chapter= chapter::with('truyen')->orderBy('id','DESC')->where('truyen_id',$truyen->id)->get();
        // lấy truyện có cùng danh mục id danh mục = truyện => danhmuctruyen=> id wherenotin loại bỏ truyện có id trùng
        $cungdanhmuc= Truyen::with('danhmuctruyen')->where('danhmuc_id',$truyen->danhmuctruyen->id)->whereNotIn('id',[$truyen->id])->get();
        return view('pages.truyen')->with(compact('danhmuc','truyen','chapter','cungdanhmuc'));
    }
}
