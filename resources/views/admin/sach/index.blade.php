@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Liệt Kê Sách</div>

                <div class="card-body p-0 ">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="container-fluid table-responsive ">
                        <table class="table   table-hover">
                            <thead class="text-center">
                                <tr>

                                    <th scope="col">Tên Sách</th>
                                    <th scope="col">Từ Khoá</th>
                                    <th scope="col">Lượt Xem</th>
                                    <th scope="col">Slug Sách</th>
                                    <th scope="col">Tóm Tắt</th>
                                    <th scope="col">Ngày Tạo</th>
                                    <th scope="col">Ngày Cập Nhật</th>
                                    <th scope="col">Kích Hoạt</th>
                                    <th scope="col">Hình Ảnh</th>
                                    <th scope="col">Quản Lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sach as $key => $Lsach)
                                <tr>
                                    <td>{{$Lsach->tensach}}</td>
                                    <td>{{$Lsach->tukhoa}}</td>
                                    <td>{{$Lsach->luotxem}}</td>
                                    <td>{{$Lsach->slug_sach}}</td>
                                    <td>{{$Lsach->tomtat}}</td>
                                    <td> {{$Lsach->created_at->diffForHumans()}} </td>
                                    <td>
                                        @if($Lsach->updated_at != '')
                                        {{$Lsach->updated_at->diffForHumans()}}</td>
                                    @endif
                                    <td>
                                        @if($Lsach->kichhoat == 1)
                                        <span class="text text-success">Kích Hoạt</span>
                                        @else
                                        <span class="text text-danger">Không kích hoạt</span>
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{asset('public/uploads/sach/'.$Lsach->hinhanh)}}" width="75px"
                                            height="100px" alt="">
                                    </td>
                                    <td>
                                        <form method="POST" action="{{route('sach.destroy',['sach' => $Lsach->id])}}">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('bạn có muốn xoá danh mục Sách này không?')"
                                                class="btn btn-danger">Delete</button>
                                        </form>
                                        <a href="{{route('sach.edit',[$Lsach->id])}}" class="btn btn-primary">Edit</a>
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