@extends('../layout')
@section('slide')
@include('pages.slide')
@endsection
@section('content')
<h1 style="margin-top: 50px;">Sách Mới Cập Nhật</h1>
<hr>
<div class="album py-5 bg-light">

    <div class="container">
        <div class="row">
            @foreach($truyen as $key => $value)
            <div class="col-md-3">
                <div class="card mb-3 box-shadow">
                        <img width="250" height="250" class="card-img-top" src=" {{ asset('public/uploads/truyen/'.$value->hinhanh) }}">
                        <div class="card-body">
                            <h5>{{$value->tentruyen}}</h5>
                            <p class="card-text">{{$value->tomtat}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="btn btn-sm btn-outline-secondary">Đọc Ngay</a>
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

<!-- sách xem nhiều -->
<h1>Sách Xem Nhiều</h1>
<hr>
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-3 box-shadow">
                    <img class="card-img-top" src=" {{ asset('public/uploads/truyen/4_zing13.jpg') }}">
                    <div class="card-body">
                        <h3>Tiêu ĐỀ</h3>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="" class="btn btn-sm btn-outline-secondary">Xem Ngay</a>
                                <a class="btn btn-sm btn-outline-secondary"> <i class="fas fa-eye"></i> 50</a>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mb-3 box-shadow">
                    <img class="card-img-top" src=" {{ asset('public/uploads/truyen/4_zing13.jpg') }}">
                    <div class="card-body">
                        <h3>Tiêu ĐỀ</h3>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="" class="btn btn-sm btn-outline-secondary">Xem Ngay</a>
                                <a class="btn btn-sm btn-outline-secondary"> <i class="fas fa-eye"></i> 50</a>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mb-3 box-shadow">
                    <img class="card-img-top" src=" {{ asset('public/uploads/truyen/4_zing13.jpg') }}">
                    <div class="card-body">
                        <h3>Tiêu ĐỀ</h3>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="" class="btn btn-sm btn-outline-secondary">Xem Ngay</a>
                                <a class="btn btn-sm btn-outline-secondary"> <i class="fas fa-eye"></i> 50</a>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mb-3 box-shadow">
                    <img class="card-img-top" src=" {{ asset('public/uploads/truyen/4_zing13.jpg') }}">
                    <div class="card-body">
                        <h3>Tiêu ĐỀ</h3>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="" class="btn btn-sm btn-outline-secondary">Xem Ngay</a>
                                <a class="btn btn-sm btn-outline-secondary"> <i class="fas fa-eye"></i> 50</a>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-right">
        <a href="" class="btn btn-success">Xem tất cả</a>
    </div>
</div>

<!-- blog -->
<h1>Blogs</h1>
<hr>
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-3 box-shadow">
                    <img class="card-img-top" src=" {{ asset('public/uploads/truyen/4_zing13.jpg') }}">
                    <div class="card-body">
                        <h3>Tiêu ĐỀ</h3>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="" class="btn btn-sm btn-outline-secondary">Xem Ngay</a>
                                <a class="btn btn-sm btn-outline-secondary"> <i class="fas fa-eye"></i> 50</a>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mb-3 box-shadow">
                    <img class="card-img-top" src=" {{ asset('public/uploads/truyen/4_zing13.jpg') }}">
                    <div class="card-body">
                        <h3>Tiêu ĐỀ</h3>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="" class="btn btn-sm btn-outline-secondary">Xem Ngay</a>
                                <a class="btn btn-sm btn-outline-secondary"> <i class="fas fa-eye"></i> 50</a>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mb-3 box-shadow">
                    <img class="card-img-top" src=" {{ asset('public/uploads/truyen/4_zing13.jpg') }}">
                    <div class="card-body">
                        <h3>Tiêu ĐỀ</h3>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="" class="btn btn-sm btn-outline-secondary">Xem Ngay</a>
                                <a class="btn btn-sm btn-outline-secondary"> <i class="fas fa-eye"></i> 50</a>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mb-3 box-shadow">
                    <img class="card-img-top" src=" {{ asset('public/uploads/truyen/4_zing13.jpg') }}">
                    <div class="card-body">
                        <h3>Tiêu ĐỀ</h3>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="" class="btn btn-sm btn-outline-secondary">Xem Ngay</a>
                                <a class="btn btn-sm btn-outline-secondary"> <i class="fas fa-eye"></i> 50</a>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-right">
        <a href="" class="btn btn-success">Xem tất cả</a>
    </div>
</div>
@endsection