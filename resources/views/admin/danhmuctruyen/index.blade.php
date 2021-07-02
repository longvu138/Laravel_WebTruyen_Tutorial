@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt Kê Danh Mục Truyện</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên Danh Mục</th>
                                <th scope="col">Slug Danh Muc</th>
                                <th scope="col">Mô Tả</th>
                                <th scope="col">Kích Hoạt</th>
                                <th scope="col">Quản Lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($danhmuctruyen as $key => $danhmuc)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$danhmuc->tendanhmuc}}</td>
                                <td>{{$danhmuc->slug_danhmuc}}</td>
                                <td>{{$danhmuc->mota}}</td>
                                <td>
                                @if($danhmuc->kichhoat == 1)
                                <span class="text text-success">Kích Hoạt</span>
                                @else
                                <span class="text text-danger">Không kích hoạt</span>
                                @endif
                                </td>
                                <td>
                                    <form  method="POST" action="{{route('danhmuc.destroy',['danhmuc' => $danhmuc->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <button 
                                    onclick="return confirm('bạn có muốn xoá danh mục truyện này không?')"
                                     class="btn btn-danger" >Delete</button>
                                    </form>
                                    <a href="{{route('danhmuc.edit',[$danhmuc->id])}}" class="btn btn-primary">Edit</a>
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