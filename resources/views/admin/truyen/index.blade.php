@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên Truyệnc</th>
                                <th scope="col">Tác Giả</th>
                                <th scope="col">Slug Truyện</th>
                                <th scope="col">Hình Ảnh</th>
                                <th scope="col">Tóm Tắt</th>
                                <th scope="col">Danh Mục</th>
                                <th scope="col">Kích Hoạt</th>
                                <th scope="col">Quản Lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($truyen as $key => $Ltruyen)
                            <tr>
                                
                                <th scope="row">{{$key}}</th>
                                <td>{{$Ltruyen->tentruyen}}</td>
                                <td>{{$Ltruyen->tacgia}}</td>
                                <td>{{$Ltruyen->slug_truyen}}</td>
                                <td> 
                                <img src="{{asset('public/uploads/truyen/'.$Ltruyen->hinhanh)}}" width="150" height="100" alt="">
                                 </td>
                                <td>{{$Ltruyen->tomtat}}</td>
                                <td>{{$Ltruyen->danhmuctruyen->tendanhmuc}}</td>
                                <td>    
                                @if($Ltruyen->kichhoat == 1)
                                <span class="text text-success">Kích Hoạt</span>
                                @else
                                <span class="text text-danger">Không kích hoạt</span>
                                @endif
                                </td>
                                <td>
                                    <form  method="POST" action="{{route('truyen.destroy',['truyen' => $Ltruyen->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <button 
                                    onclick="return confirm('bạn có muốn xoá danh mục truyện này không?')"
                                     class="btn btn-danger" >Delete</button>
                                    </form>
                                    <a href="{{route('truyen.edit',[$Ltruyen->id])}}" class="btn btn-primary">Edit</a>
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