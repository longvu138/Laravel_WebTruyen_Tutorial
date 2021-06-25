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
                <div class="card-header">Thêm Danh Mục Truyện</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{route('danhmuc.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Danh Mục</label>
                            <input type="text" value="{{old('tendanhmuc')}}" name="tendanhmuc" 
                            
                            class="form-control" id="slug" onkeyup="ChangeToSlug()" placeholder="thêm danh mục truyện">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug Danh Mục</label>
                            <input type="text" value="{{old('slug_danhmuc')}}" name="slug_danhmuc" class="form-control"
                             id="convert_slug" placeholder="thêm danh mục truyện">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả</label>
                            <input type="text" value="{{old('mota')}}" name="mota" class="form-control" id="exampleInputEmail1" placeholder="mô tả danh mục truyện">
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