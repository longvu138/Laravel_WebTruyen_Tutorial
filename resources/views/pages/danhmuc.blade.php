@extends('../layout')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang Chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$tendanhmuc}}</li>
    </ol>
</nav>

<h1 style="margin-top: 50px;">{{$tendanhmuc}}</h1>
<hr>
<div class="album py-5 bg-light">

    <div class="container">
        <div class="row">
            @php
            $count= count($truyen);
            @endphp
            @if($count == 0)
            <div class="col-md-12">
                <div class="card mb-12 box-shadow">
                   <div class="card-body">
                       <p>Truyện đang được cập nhật!! Waiting.....</p>
                   </div>
                </div>
            </div>
            @else
            @foreach($truyen as $key => $value)
            <div class="col-md-3">
                <div class="card mb-3 box-shadow">
                    <img width="250" height="250" class="card-img-top"
                        src=" {{ asset('uploads/truyen/'.$value->hinhanh) }}">
                    <div class="card-body">
                        <h5>{{$value->tentruyen}}</h5>
                        <p class="card-text">{{$value->tomtat}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{url('xem-truyen/'.$value->slug_truyen)}}"
                                    class="btn btn-sm btn-outline-secondary">Đọc Ngay</a>
                                <a class="btn btn-sm btn-outline-secondary"> <i class="fas fa-eye"></i> 50</a>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            @endforeach
        
            <div class="container text-right">
                <a href="" class="btn btn-success">Xem tất cả</a>
            </div>
        </div>
        @endif
        @endsection