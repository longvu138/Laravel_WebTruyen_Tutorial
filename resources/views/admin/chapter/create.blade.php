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
                <div class="card-header">Thêm Danh chapter</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{route('chapter.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên chapter</label>
                            <input type="text" value="{{old('tieude')}}" name="tieude" 
                            
                            class="form-control" id="slug" onkeyup="ChangeToSlug()" >
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug chapter</label>
                            <input type="text" value="{{old('slug_chapter')}}" name="slug_chapter" class="form-control"
                             id="convert_slug" >
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">tóm tắt chaptrer</label>
                            <input type="text" value="" name="tomtat" class="form-control"
                             id="convert_slug" >
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung</label>
                            <textarea name="noidung" class="form-control" rows="5" style="resize:none" ></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">thuộc truyện</label>
                            <select class="custom-select" name="truyen_id" id="">
                            @foreach($truyen as $key => $value)
                                <option value="{{$value->id}}">{{$value->tentruyen}}</option>
                            @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Kích Hoạt</label>
                            <select class="custom-select" name="kichhoat" id="">
                                <option value="1">Kích Hoạt</option>
                                <option value="0">Không kích hoạt</option>
                            </select>
                        </div>
                        <button type="submit" name="themdanhmuc" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
        @endsection