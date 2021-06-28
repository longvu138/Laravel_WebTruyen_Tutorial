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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập Nhật Chapter</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{route('chapter.update',[$chapter -> id])}}">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên chapter</label>
                            <input type="text" value="{{$chapter->tieude}}" onkeyup="ChangeToSlug()"
                             name="tieude" class="form-control" id="slug" placeholder="thêm danh mục truyện">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug Chapter</label>
                            <input type="text" value="{{$chapter->slug_chapter}}" name="slug_chapter" 
                            class="form-control" id="convert_slug" placeholder="thêm danh mục truyện">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội Dung</label>
                            <Textarea name="noidung" id="noidungchapter" rows="5" style="resize:none" class="form-control">{{$chapter->noidung}}</Textarea>

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt</label>
                            <input type="text" value="{{$chapter->tomtat}}" name="tomtat" class="form-control" id="exampleInputEmail1" placeholder="mô tả danh mục truyện">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">thuộc truyện</label>
                            <select class="custom-select" name="truyen_id" id="">
                            @foreach($truyen as $key => $value)
                                <option {{$chapter->truyen_id ==$value->id? 'selected':''}} value="{{$value->id}}">{{$value->tentruyen}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Kích Hoạt</label>
                            <select class="custom-select" name="kichhoat" id="">
                                @if( $chapter->kichhoat == 1)
                                <option selected value="1">Kích Hoạt</option>
                                <option value="0">Không kích hoạt</option>
                                @else
                                <option value="1">Kích Hoạt</option>
                                <option selected value="0">Không kích hoạt</option>
                                @endif
                            </select>
                        </div>

                        <button type="submit" name="themchapter" class="btn btn-primary">Cập Nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection