<?php

namespace App\Http\Controllers;
use App\Models\chapter;
use App\Models\Truyen;
use Illuminate\Http\Request;

class chapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $chapter = chapter::with('truyen')->orderBy('id','DESC')->get();
        // dd($chapter);
        return view('admin.chapter.index')->with(compact('chapter'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $truyen = Truyen::orderBy('id','DESC')->get();
        return view('admin.chapter.create')->with(compact('truyen'));
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
              //
        $data = $request->validate(
            [
                'tieude' => 'required|max:255|unique:chapter',
                'tomtat' => 'required|max:255',
                'kichhoat' => 'required',
                'noidung'=>'required',
                'slug_chapter' => 'required|max:255|unique:chapter',
                'truyen_id' => 'required'
            ],
            [   'tieude.unique' => 'Tên chapter đã có',    
                'tieude.required' => 'Tên chapter phải có',
                'slug_chapter.required' => 'slug chapter phải có',
                'slug_chapter.unique' => 'slug chapter đã có, điền khác',
                'noidung.required' => "noidung phải có",
                'tomtat.required' => 'tóm tắt phải có',
            
            ]
        );
        // tao đối tượng danh muc truyện từ model danhmuctruyen
        $chapter = new chapter();
        $chapter->tieude = $data['tieude'];
        $chapter->slug_chapter = $data['slug_chapter'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->kichhoat = $data['kichhoat'];
        $chapter->noidung = $data['noidung'];
        $chapter->truyen_id  = $data['truyen_id'];
        $chapter->save();
        return redirect()->back()->with('status', 'thêm chapter thành cong');


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
        $chapter = chapter::find($id);
        $truyen = Truyen::orderBy('id','DESC')->get();
        return view('admin.chapter.edit')->with(compact('truyen','chapter'));
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
                'tieude' => 'required|max:255',
                'tomtat' => 'required|max:255',
                'kichhoat' => 'required',
                'noidung'=>'required',
                'slug_chapter' => 'required|max:255',
                'truyen_id' => 'required'
            ],
            [   'tieude.unique' => 'Tên chapter đã có',    
                'tieude.required' => 'Tên chapter phải có',
                'slug_chapter.required' => 'slug chapter phải có',
                'slug_chapter.unique' => 'slug chapter đã có, điền khác',
                'noidung.required' => "noidung phải có",
                'tomtat.required' => 'tóm tắt phải có',
            
            ]
        );
        // tao đối tượng danh muc truyện từ model danhmuctruyen
        $chapter = chapter::find($id);
        $chapter->tieude = $data['tieude'];
        $chapter->slug_chapter = $data['slug_chapter'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->kichhoat = $data['kichhoat'];
        $chapter->noidung = $data['noidung'];
        $chapter->truyen_id  = $data['truyen_id'];
        $chapter->save();
        return redirect()->back()->with('status', 'thêm chapter thành cong');
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
        chapter::find($id)->delete();
        return redirect()->back()->with('status', 'xoá chapter thành cong');
        
    }
}
