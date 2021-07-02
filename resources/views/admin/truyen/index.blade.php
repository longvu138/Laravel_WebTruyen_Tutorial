@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Liệt Kê Truyện</div>
                <div id="thongbao" style="text-align: center; font-size: 20px;"></div>
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

                                    <th scope="col">Tên Truyện</th>
                                    <th scope="col">Từ Khoá</th>
                                    <th scope="col">Lượt Xem</th>
                                    <th scope="col">Tác Giả</th>
                                    <th scope="col">Slug Truyện</th>
                                    <th scope="col">Tóm Tắt</th>
                                    <th scope="col">Danh Mục</th>
                                    <th scope="col">Thể Loại</th>
                                    <th scope="col">Ngày Tạo</th>
                                    <th scope="col">Ngày Cập Nhật</th>
                                    <th scope="col">Truyện hot</th>
                                    <th scope="col">Kích Hoạt</th>
                                    <th scope="col">Hình Ảnh</th>
                                    <th scope="col">Quản Lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($truyen as $key => $Ltruyen)
                                <tr>
                                    <td>{{$Ltruyen->tentruyen}}</td>
                                    <td>{{$Ltruyen->tukhoa}}</td>
                                    <td>{{$Ltruyen->luotxem}}</td>
                                    <td>{{$Ltruyen->tacgia}}</td>
                                    <td>{{$Ltruyen->slug_truyen}}</td>
                                    <td>{{$Ltruyen->tomtat}}</td>
                                    <td>{{$Ltruyen->danhmuctruyen->tendanhmuc}}</td>
                                    <td>{{$Ltruyen->theloai->tentheloai}}</td>
                                    <td> {{$Ltruyen->created_at->diffForHumans()}} </td>
                                    <td>
                                        @if($Ltruyen->updated_at != '')
                                        {{$Ltruyen->updated_at->diffForHumans()}}</td>
                                    @endif
                                    <td width="10%">
                                        <!-- @if($Ltruyen->truyennoibat == 0)
                                                                                            <span class="text text-success">Truyện mới</span>
                                                                                            @elseif($Ltruyen->truyennoibat == 1)
                                                                                            <span class="text text-danger">Truyện Nổi Bật</span>
                                                                                            @else
                                                                                            <span class="text text-danger">Truyện Xem Nhiều</span>
                                                                                            @endif -->

                                        @if( $Ltruyen->truyennoibat == 0)
                                        <form action="">
                                            @csrf
                                            <select class="custom-select truyennoibat" data-truyen_id={{$Ltruyen->id}}
                                                name="truyennoibat" id="">
                                                <option selected value="0">Truyện mới</option>
                                                <option value="1">Truyện nổi bật</option>
                                                <option value="2">Truyện Xem Nhiều</option>
                                            </select>
                                        </form>
                                        @elseif($Ltruyen->truyennoibat == 1)
                                        <form action="">
                                            @csrf
                                            <select class="custom-select truyennoibat" data-truyen_id={{$Ltruyen->id}}
                                                name="truyennoibat" id="">
                                                <option value="0">Truyện mới</option>
                                                <option selected value="1">Truyện nổi bật</option>
                                                <option value="2">Truyện Xem Nhiều</option>
                                            </select>
                                        </form>
                                        @else
                                        <form action="">
                                            @csrf
                                            <select class="custom-select truyennoibat" data-truyen_id={{$Ltruyen->id}}
                                                name="truyennoibat" id="">
                                                <option value="0">Truyện mới</option>
                                                <option value="1">Truyện nổi bật</option>
                                                <option selected value="2">Truyện Xem Nhiều</option>
                                            </select>
                                        </form>
                                        @endif

                                    </td>
                                    <td>
                                        @if($Ltruyen->kichhoat == 1)
                                        <span class="text text-success">Kích Hoạt</span>
                                        @else
                                        <span class="text text-danger">Không kích hoạt</span>
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{asset('public/uploads/truyen/'.$Ltruyen->hinhanh)}}" width="75px"
                                            height="100px" alt="">
                                    </td>
                                    <td>
                                        <form method="POST"
                                            action="{{route('truyen.destroy',['truyen' => $Ltruyen->id])}}">
                                            @method('DELETE')
                                            @csrf
                                            <button
                                                onclick="return confirm('bạn có muốn xoá danh mục truyện này không?')"
                                                class="btn btn-danger">Delete</button>
                                        </form>
                                        <a href="{{route('truyen.edit',[$Ltruyen->id])}}"
                                            class="btn btn-primary">Edit</a>
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