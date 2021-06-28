@extends('../layout')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Library</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-3">
                <img class="card-img-top" src=" {{ asset('public/uploads/truyen/'.$truyen->hinhanh) }}" />
            </div>
            <div class="col-md-9">
                <ul class="infotruyen" style="list-style: none">
                    <li>Tên Truyện: {{$truyen->tentruyen}} </li>
                    <li>tác giả: {{$truyen->tacgia}} </li>
                    <li>Danh Mục Truyên: <a
                            href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a>
                    </li>
                    <li>số chapter:2000</li>
                    <li>Lượt xem:200</li>
                    <li><a href="">Xem mục lục</a></li>
                   
                    @if($chapter_dau)
                    <li><a href="{{url('xem-chapter/'.$chapter_dau->slug_chapter)}}" class="btn btn-primary">Đọc online</a></li>
                    @else
                    <li> <a href="" class="btn btn-danger"> đang cập nhật...</a> </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                sunt in culpa qui officia deserunt mollit anim id est
                laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna
                aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                aute irure dolor in reprehenderit in voluptate velit esse cillum
                dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum.
            </p>
        </div>
        <hr />
        <h4>Mục Lục</h4>
        <ul class="mucluctruyen">
            @php
            $mucluc = count($chapter);
            @endphp
            @if($mucluc>0)
            @foreach($chapter as $key => $chap)
            <li><a href="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</a></li>
            @endforeach
            @else
            <li> mục lục đang cập nhật ...</li>
            @endif
        </ul>
        <h4>Sách cùng danh mục</h4>
        <div class="row">
            @foreach($cungdanhmuc as $key => $value)
            <div class="col-md-3">
                <div class="card mb-3 box-shadow">
                    <img width="250" height="250" class="card-img-top"
                        src=" {{ asset('public/uploads/truyen/'.$value->hinhanh) }}">
                    <div class="card-body">
                        <h5>{{$value->tentruyen}}</h5>
                        <p class="card-text">{{$value->tomtat}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{url('xem-truyen/'.$value->slug_truyen)}}"
                                    class="btn btn-sm btn-outline-secondary">Đọc Ngay</a>
                                <a class="btn btn-sm btn-outline-secondary"> <i class="fas fa-eye"></i> 50</a>
                            </div>
                          
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="col-md-3">
        <h3>Sách được xem nhiều nhất</h3>
    </div>
</div>

@endsection