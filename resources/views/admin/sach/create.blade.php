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
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Thêm Sách</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{route('sach.store')}} " enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Sách</label>
                            <input type="text" value="{{old('tensach')}}" name="tensach" 
                            
                            class="form-control" id="slug" onkeyup="ChangeToSlug()" placeholder="tên sách">
                        </div>

                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Từ Khoá</label>
                            <input type="text" value="{{old('tukhoa')}}" name="tukhoa"  class="form-control" placeholder="">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lượt Xem</label>
                            <input type="text" value="{{old('luotxem')}}" name="luotxem"  class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug sách</label>
                            <input type="text" value="{{old('slug_sach')}}" name="slug_sach" class="form-control"
                             id="convert_slug" placeholder="thêm sách">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt truyện</label>
                           <Textarea name="tomtat"  value="{{old('tomtat')}}" rows="5" style="resize:none" class="form-control"></Textarea>
                        </div>

                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội Dung Sách</label>
                           <Textarea name="noidung"  value="{{old('noidung')}}" id="ckeditor_sach" rows="5" style="resize:none" class="form-control"></Textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình Ảnh sách</label>
                            <input type="file" class="form-control-file" name="hinhanh" 
                            placeholder="thêm sach">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kích Hoạt</label>
                            <select class="custom-select" name="kichhoat" id="">
                                <option value="1">Kích Hoạt</option>
                                <option value="0">Không kích hoạt</option>
                            </select>
                        </div>
                        <button type="submit" name="themsach" class="btn btn-primary">Thêm Sách</button>
                    </form>
                </div>
            </div>
        </div>
 @endsection