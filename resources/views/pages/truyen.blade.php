@extends('../layout')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang Chủ</a></li>
        <li class="breadcrumb-item"><a
                href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a>
        </li>
        <li class="breadcrumb-item">{{$truyen->tentruyen}}</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-3">
                <img class="card-img-top img-responsive"
                    src=" {{ asset('uploads/truyen/'.$truyen->hinhanh) }}" />
            </div>
            <div class="col-md-9">
                <ul class="infotruyen" style="list-style: none">
                    <div class="fb-share-button" data-href="{{\URL::current()}}" data-layout="button_count"
                        data-size="large">
                        <a target="_blank" href="{{\URL::current()}}&amp;src=sdkpreparse"
                            class="fb-xfbml-parse-ignore">Chia
                            sẻ</a>
                    </div>
                    <li>Tên Truyện: {{$truyen->tentruyen}} </li>
                    <li>Ngày Đăng: {{$truyen->created_at->diffForHumans() }} </li>
                    <li>tác giả: {{$truyen->tacgia}} </li>
                    <li>Danh Mục Truyên: <a
                            href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a>
                    </li>
                    <li>Thể Loại: <a
                            href="{{url('the-loai/'.$truyen->theloai->slug_theloai)}}">{{$truyen->theloai->tentheloai}}</a>
                    </li>
                    <li>Lượt xem: {{$truyen->luotxem}}</li>

                    @if($chapter_dau)
                    <li style="margin-bottom: 15px;"><a
                            href="{{url('xem-chapter/'.$chapter_moinhat->slug_chapter)}}">Đọc Chương mới nhất</a></li>
                    <li><a href="{{url('xem-chapter/'.$chapter_dau->slug_chapter)}}" class="btn btn-primary">Đọc
                            online</a></li>


                    @else
                    <li> <a href="" class="btn btn-danger"> đang cập nhật...</a> </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <p>
                {{$truyen->tomtat}}
            </p>
        </div>
        <style>
            .tagcloud05 ul {
                margin: 0;
                padding: 0;
                list-style: none;
            }

            .tagcloud05 ul li {
                display: inline-block;
                margin: 0 0 .3em 1em;
                padding: 0;
            }

            .tagcloud05 ul li a {
                position: relative;
                display: inline-block;
                height: 30px;
                line-height: 30px;
                padding: 0 1em;
                background-color: #3498db;
                border-radius: 0 3px 3px 0;
                color: #fff;
                font-size: 13px;
                text-decoration: none;
                -webkit-transition: .2s;
                transition: .2s;
            }

            .tagcloud05 ul li a::before {
                position: absolute;
                top: 0;
                left: -15px;
                content: '';
                width: 0;
                height: 0;
                border-color: transparent #3498db transparent transparent;
                border-style: solid;
                border-width: 15px 15px 15px 0;
                -webkit-transition: .2s;
                transition: .2s;
            }

            .tagcloud05 ul li a::after {
                position: absolute;
                top: 50%;
                left: 0;
                z-index: 2;
                display: block;
                content: '';
                width: 6px;
                height: 6px;
                margin-top: -3px;
                background-color: #fff;
                border-radius: 100%;
            }

            .tagcloud05 ul li span {
                display: block;
                max-width: 100px;
                white-space: nowrap;
                text-overflow: ellipsis;
                overflow: hidden;
            }

            .tagcloud05 ul li a:hover {
                background-color: #555;
                color: #fff;
            }

            .tagcloud05 ul li a:hover::before {
                border-right-color: #555;
            }
        </style>
        <p>Từ Khoá Tìm Kiếm:
            @php
            $tukhoa = explode(',',$truyen->tukhoa);
            @endphp
            {{$truyen->tukhoa}}

        <div class="tagcloud05">
            <ul>
                @foreach($tukhoa as $key => $tk)
                <li><a href="{{url('tag/'.\Str::slug($tk))}}"><span>{{$tk}}</span></a></li>
                @endforeach
            </ul>
        </div>
        </p>
        <hr />
        <h4>Danh sách chương</h4>
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
        

        <div class="fb-comments" data-href="  {{\URL::current()}}" data-width="100%" data-numposts="5"></div>
        <h4>Sách cùng danh mục</h4>
        <div class="row">
            @foreach($cungdanhmuc as $key => $value)
            <div class="col-md-3">
                <div class="card mb-3 box-shadow">
                    <img class="card-img-top img-responsive"
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

                        </div>
                    </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="col-md-3">
        <h3 class="card-header" style="background-color:#ffdada !important;">Truyện Nổi Bật</h3>
        @foreach($truyennoibat as $key => $trnoibat)
        <div class="row mt-2">

            <div class="col-md-6">
                <img src="{{ asset('uploads/truyen/'.$trnoibat->hinhanh) }}" alt=""
                    class="card-img-top img-responsive">
            </div>
            <div class="col-md-6 sidebar">
                <a href="{{url('xem-truyen/'.$trnoibat->slug_truyen)}}">
                <p class="mt-2">
                    {{$trnoibat->tentruyen}}
                </p>
                </a>
                <p class="">
                    <i class="fas fa-eye"> {{$trnoibat->luotxem}}</i>
                </p>
            </div>

        </div>
        @endforeach
        <h3 class="card-header mt-2" style="background-color:#ffdada !important;">Truyện Xem Nhiều</h3>
        @foreach($truyenxemnhieu as $key => $trxemnhieu)
        <div class="row mt-2">
            <div class="col-md-6">
                <img src="{{ asset('uploads/truyen/'.$trxemnhieu->hinhanh) }}" alt=""
                    class="card-img-top img-responsive">
            </div>
            <div class="col-md-6 sidebar">
                <p class="mt-2">
                    {{$trxemnhieu->tentruyen}}
                </p>
                <p class="">
                    <i class="fas fa-eye"> {{$trxemnhieu->luotxem}}</i>
                </p>
            </div>
        </div>
        @endforeach
    </div>


</div>

@endsection