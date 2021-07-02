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
                    <form method="POST" action="{{route('sach.update',[$sach->id])}} " enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Sách</label>
                            <input type="text" value="{{$sach->tensach}}" name="tensach" 
                            
                            class="form-control" id="slug" onkeyup="ChangeToSlug()" placeholder="tên sách">
                        </div>

                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Từ Khoá</label>
                            <input type="text" value="{{$sach->tukhoa}}" name="tukhoa"  class="form-control" placeholder="">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lượt Xem</label>
                            <input type="text" value="{{$sach->luotxem}}" name="luotxem"  class="form-control" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug sách</label>
                            <input type="text" value="{{$sach->slug_sach}}" name="slug_sach" class="form-control"
                             id="convert_slug" placeholder="thêm sách">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt truyện</label>
                           <Textarea name="tomtat"  value="" rows="5" style="resize:none" class="form-control">{{$sach->tomtat}}</Textarea>
                        </div>

                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội Dung Sách</label>
                           <Textarea name="noidung"  value="" id="ckeditor_sach" rows="5" style="resize:none" class="form-control">{{$sach->noidung}}</Textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình Ảnh Sách</label>
                            <input type="file" class="form-control-file" name="hinhanh">
                            <img src="{{asset('public/uploads/sach/'.$sach->hinhanh)}}" width="150" height="100"
                                alt="">

                        </div>
                        
                        <div class="form-group">

                            <label for="exampleInputEmail1">Kích Hoạt</label>
                            <select class="custom-select" name="kichhoat" id="">
                                @if( $sach->kichhoat == 1)
                                <option selected value="1">Kích Hoạt</option>
                                <option value="0">Không kích hoạt</option>
                                @else
                                <option value="1">Kích Hoạt</option>
                                <option selected value="0">Không kích hoạt</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" name="themsach" class="btn btn-primary">Thêm Sách</button>
                    </form>
                </div>
            </div>
        </div>
 @endsection