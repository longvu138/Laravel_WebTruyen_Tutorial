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
                <div class="card-header">Thêm Thể Loại</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{route('theloai.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Thể Loại</label>
                            <input type="text" value="{{old('tentheloai')}}" name="tentheloai" class="form-control"
                                id="slug" onkeyup="ChangeToSlug()">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug Thể Loại</label>
                            <input type="text" value="{{old('slug_theloai')}}" name="slug_theloai" class="form-control"
                                id="convert_slug">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô Tả</label>
                            <input type="text" value="" name="mota" class="form-control">
                        </div>

                        <button type="submit" name="themdanhmuc" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
        @endsection