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
                <div class="card-header">Cập Nhật Truyện</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{route('truyen.update',[$truyen->id])}} "
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Truyện</label>
                            <input type="text" value="{{$truyen->tentruyen}}" name="tentruyen" class="form-control"
                                id="slug" onkeyup="ChangeToSlug()" placeholder="tên truyện">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Từ Khoá</label>
                            <input type="text" value="{{$truyen->tukhoa}}" name="tukhoa" class="form-control"
                                placeholder="tác giả">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Lượt Xem</label>
                            <input type="text" value="{{$truyen->luotxem}}" name="luotxem" class="form-control"
                                placeholder="tác giả">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tác Giả</label>
                            <input type="text" value="{{$truyen->tacgia}}" name="tacgia" class="form-control"
                                placeholder="tác giả">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug Truyện</label>
                            <input type="text" value="{{$truyen->slug_truyen}}" name="slug_truyen" class="form-control"
                                id="convert_slug" placeholder="thêm truyện">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt truyện</label>
                            <Textarea name="tomtat" rows="5" style="resize:none"
                                class="form-control">{{$truyen->tomtat}}</Textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh Mục Truyện</label>
                            <select class="custom-select" name="danhmuc_id" id="">
                                @foreach($danhmuc as $key => $dm)

                                <option {{ $dm->id == $truyen->danhmuc_id ? 'selected' : ''}}
                                    value="{{$dm->id}}">{{$dm->tendanhmuc}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Thể Loại Truyện</label>
                            <select class="custom-select" name="theloai" id="">
                                @foreach($theloai as $key => $dm)

                                <option {{ $dm->id == $truyen->theloai_id ? 'selected' : ''}}
                                    value="{{$dm->id}}">{{$dm->tentheloai}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình Ảnh truyện</label>
                            <input type="file" class="form-control-file" name="hinhanh">
                            <img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" width="150" height="100"
                                alt="">

                        </div>

                        <div class="form-group">

                            <label for="exampleInputEmail1">Truyện Hot</label>
                            <select class="custom-select" name="truyennoibat" id="">
                                @if( $truyen->truyennoibat == 0)
                                <option selected value="0">Truyện mới</option>
                                <option value="1">Truyện nổi bật</option>
                                <option value="2">Truyện Xem Nhiều</option>
                                @elseif($truyen->truyennoibat == 1)
                                <option value="0">Truyện mới</option>
                                <option selected value="1">Truyện nổi bật</option>
                                <option value="2">Truyện Xem Nhiều</option>
                                @else
                                <option value="0">Truyện mới</option>
                                <option value="1">Truyện nổi bật</option>
                                <option selected value="2">Truyện Xem Nhiều</option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group">

                            <label for="exampleInputEmail1">Kích Hoạt</label>
                            <select class="custom-select" name="kichhoat" id="">
                                @if( $truyen->kichhoat == 1)
                                <option selected value="1">Kích Hoạt</option>
                                <option value="0">Không kích hoạt</option>
                                @else
                                <option value="1">Kích Hoạt</option>
                                <option selected value="0">Không kích hoạt</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" name="themdanhmuc" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
        @endsection