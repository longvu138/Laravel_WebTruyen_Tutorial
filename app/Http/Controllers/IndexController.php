<?php

namespace App\Http\Controllers;

use App\Models\chapter;
use Illuminate\Http\Request;
use App\Models\DanhMucTruyen;
use App\Models\Truyen;
use App\Models\TheLoai;

class IndexController extends Controller
{
    //
    public function home()
    {
        // 
        $theloai = TheLoai::orderBy('id', 'DESC')->get();
        //  lấy tất cả các danh mục truyện sắp xếp theo id từ DESC là gì đéo nhớ
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();

       
        // Lấy tất cả các truyện theo id sắp xếp theo DESC điều kiện có kích hoạt là 1 
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 1)->get();
        // gửi ra trang home trong thư mục pages tất cả data từ danhmuc và truyen
        return view('pages.home')->with(compact('danhmuc', 'truyen','theloai'));
        # code...
    }

    public function danhmuc($slug)
    {
        // 
        $theloai = TheLoai::orderBy('id', 'DESC')->get();
        // 
        
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();
        // lấy id theo slug truyền qua lấy 1 bản ghi
        $danhmuc_id= DanhMucTruyen::where('slug_danhmuc',$slug)->first();
        // 
        $tendanhmuc = $danhmuc_id->tendanhmuc;
        // lấy danh sách truyện theo id sắp xếp desc điuef kiện kích hoạt = 1 và danhmuc_id bằng iddanhmuc
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 1)->where('danhmuc_id',$danhmuc_id->id)->get();
        return view('pages.danhmuc')->with(compact('danhmuc','tendanhmuc','truyen','theloai'));
    }

    public function xemtruyen($slug)
    {
        // 
        $theloai = TheLoai::orderBy('id', 'DESC')->get();
        // 
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();
        // lấy truyện với danhmuctruyen có slug bằng slug truyền vào và  kích hoạt bằng 1
        $truyen= Truyen::with('danhmuctruyen')->where('slug_truyen',$slug)->where('kichhoat',1)->first();
        // 
        $chapter= chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->id)->get();
        // 
        $chapter_dau= chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->id)->first();

        // lấy truyện có cùng danh mục id danh mục = truyện => danhmuctruyen=> id wherenotin loại bỏ truyện có id trùng
        $cungdanhmuc= Truyen::with('danhmuctruyen')->where('danhmuc_id',$truyen->danhmuctruyen->id)->whereNotIn('id',[$truyen->id])->get();
        return view('pages.truyen')->with(compact('danhmuc','truyen','chapter','cungdanhmuc','chapter_dau','theloai'));
    }
    public function xemchapter($slug)
    {
        // 
        $theloai = TheLoai::orderBy('id', 'DESC')->get();
        // 
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();
        // 
        $truyen= chapter::where('slug_chapter',$slug)->first();
        // 
        $chapter= chapter::with('truyen')->where('slug_chapter',$slug)->where('truyen_id',$truyen->truyen_id)->first();
        // 
        $allchapter= chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->truyen_id)->get();
        //  
        $maxid= chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','DESC')->first();
        // 
        $minid= chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','ASC')->first();

        // 
        $next_chapter = chapter::where('truyen_id',$truyen->truyen_id)->where('id','>',$chapter->id)->min('slug_chapter');
        // 
        $previous_chapter = chapter::where('truyen_id',$truyen->truyen_id)->where('id','<',$chapter->id)->max('slug_chapter');

        return view('pages.chapter')->with(compact('danhmuc','theloai','chapter','allchapter','next_chapter','previous_chapter','maxid','minid'));

    }

    public function theloai($slug)
    {
        // 
        $theloai = TheLoai::orderBy('id', 'DESC')->get();
        // 
        $danhmuc = DanhMucTruyen::orderBy('id', 'DESC')->get();
        // 
        $theloai_id= TheLoai::where('slug_theloai',$slug)->first();
        
        // 
        $tentheloai = $theloai_id->tentheloai;
        // 
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 1)->where('theloai_id',$theloai_id->id)->get();
       
        return view('pages.theloai')->with(compact('danhmuc','tentheloai','truyen','theloai'));
    }
}
