@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Thêm Truyện</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{route('truyen.store')}} " enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Truyện</label>
                            <input type="text" value="{{old('tentruyen')}}" name="tentruyen" 
                            
                            class="form-control" id="slug" onkeyup="ChangeToSlug()" placeholder="tên truyện">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tác Giả</label>
                            <input type="text" value="{{old('tacgia')}}" name="tacgia"  class="form-control" placeholder="tác giả">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Từ Khoá</label>
                            <input type="text" value="{{old('tukhoa')}}" name="tukhoa"  class="form-control" placeholder="tác giả">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lượt Xem</label>
                            <input type="text" value="{{old('luotxem')}}" name="luotxem"  class="form-control" placeholder="tác giả">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug Truyện</label>
                            <input type="text" value="{{old('slug_truyen')}}" name="slug_truyen" class="form-control"
                             id="convert_slug" placeholder="thêm truyện">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt truyện</label>
                           <Textarea name="tomtat" rows="5" style="resize:none" class="form-control"></Textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh Mục Truyện</label>
                            <select class="custom-select" name="danhmuc_id" id="">
                               @foreach($danhmuc as $key => $dm) 
                                <option value="{{$dm->id}}">{{$dm->tendanhmuc}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Thể Loại Truyện</label>
                            <select class="custom-select" name="theloai" id="">
                               @foreach($theloai as $key => $loai) 
                                <option value="{{$dm->id}}">{{$loai->tentheloai}}</option>
                            @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">

                            <label for="exampleInputEmail1">Truyện Hot</label>
                            <select class="custom-select" name="truyennoibat" id="">
                                <option value="0">Truyện mới</option>
                                <option value="1">Truyện nổi bật</option>
                                <option value="2">Truyện Xem Nhiều</option>

                            </select>
                        </div> 

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình Ảnh truyện</label>
                            <input type="file" class="form-control-file" name="hinhanh" 
                             id="convert_slug" placeholder="thêm truyện">
                        </div>
                        <div class="form-group">

                            <label for="exampleInputEmail1">Kích Hoạt</label>
                            <select class="custom-select" name="kichhoat" id="">
                                <option value="1">Kích Hoạt</option>
                                <option value="0">Không kích hoạt</option>
                            </select>
                        </div>
                        <button type="submit" name="themdanhmuc" class="btn btn-primary">Thêm truyện</button>
                    </form>
                </div>
            </div>
        </div>
 @endsection