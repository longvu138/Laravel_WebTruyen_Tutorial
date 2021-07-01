@extends('../layout')
{{-- @section('slide')
@include('pages.slide')
@endsection--}}
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang Chủ</a></li>
        <li class="breadcrumb-item"><a
                href="{{url('the-loai/'.$truyen_breadcrumb->theloai->slug_theloai)}}">{{$truyen_breadcrumb->theloai->tentheloai}}</a>
        </li>

        <li class="breadcrumb-item"><a
                href="{{url('danh-muc/'.$truyen_breadcrumb->danhmuctruyen->slug_danhmuc)}}">{{$truyen_breadcrumb->danhmuctruyen->tendanhmuc}}</a>
        </li>
        <li class="breadcrumb-item">{{$truyen_breadcrumb->tentruyen}}</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12">
        <h4> {{$chapter->truyen->tentruyen}}</h4>
        <p>Chương hiện tại: {{$chapter->tieude}}</p>
        <div class="col-md-5">
            <style>
                .disable {
                    color: currentColor;
                    pointer-events: none;
                    opacity: 0.7;
                    text-decoration: none;
                }
            </style>
            <div class="form-group">
                <label for="">Chọn Chương</label>
                <p> <a href="{{url('xem-chapter/'.$previous_chapter)}}" class="btn btn-primary 
                    {{$chapter->id == $minid -> id ? 'disable': ''}}">Tập Trước</a> </p>
                <select name="kichhoat" id="select-chapter" class="custom-select select-chapter">
                    @foreach($allchapter as $key => $achap)
                    <option value="{{url('xem-chapter/'.$achap->slug_chapter)}}">{{$achap->tieude}}</option>
                    @endforeach
                </select>
                <p class=" mt-4"> <a href=" {{url('xem-chapter/'.$next_chapter)}}" class="btn btn-primary 
                    {{$chapter->id == $maxid -> id ? 'disable': ''}}">Tập
                        Sau</a> </p>
            </div>
        </div>

        <div class="noidungchuong">
            {!!$chapter->noidung!!}

            <div class="fb-share-button" data-href="{{\URL::current()}}" data-layout="button_count" data-size="large">
                <a target="_blank" href="{{\URL::current()}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia
                    sẻ</a>
            </div>
            <div class="fb-comments" data-href="  {{\URL::current()}}" data-width="100%" data-numposts="5"></div>


        </div>
    </div>
    @endsection