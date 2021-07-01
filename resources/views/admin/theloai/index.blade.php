@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thể Loại Truyện</div>

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
                                <th scope="col">Tên Thể Loại</th>
                                <th scope="col">Slug theloai</th>
                                <th scope="col">Mô Tả</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($theloai as $key => $tl)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$tl->thetheloai}}</td>
                                <td>{{$tl->slug_theloai}}</td>
                                <td>{{$tl->mota}}</td>
                                <td>
                                    <form  method="POST" action="{{route('theloai.destroy',['theloai' => $tl->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <button 
                                    onclick="return confirm('bạn có muốn xoá danh mục truyện này không?')"
                                     class="btn btn-danger" >Delete</button>
                                    </form>
                                    <a href="{{route('theloai.edit',[$tl->id])}}" class="btn btn-primary">Edit</a>
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