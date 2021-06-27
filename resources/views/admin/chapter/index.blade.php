@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt Kê Chapter</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên Chapter</th>
                                <th scope="col">Slug Chapter</th>
                                <th scope="col">Mô Tả</th>
                                <th scope="col">Thuộc Truyện</th>
                                <th scope="col">Kích Hoạt</th>
                                <th scope="col">Quản Lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chapter as $key => $chap)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$chap->tieude}}</td>
                                <td>{{$chap->slug_chapter}}</td>
                                <td>{{$chap->tomtat}}</td>
                                <td>{{$chap->truyen->tentruyen}}</td>
                                <td>
                                @if($chap->kichhoat == 1)
                                <span class="text text-success">Kích Hoạt</span>
                                @else
                                <span class="text text-danger">Không kích hoạt</span>
                                @endif
                                </td>
                                <td>
                                    <form  method="POST" action="{{route('chapter.destroy',['chapter' => $chap->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <button 
                                    onclick="return confirm('bạn có muốn xoá danh mục truyện này không?')"
                                     class="btn btn-danger" >Delete</button>
                                    </form>
                                    <a href="{{route('chapter.edit',[$chap->id])}}" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection