@extends('../layout')
{{-- @section('slide')
@include('pages.slide')
@endsection--}}
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Library</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
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
            <h3>Lưu và chia sẻ truyện:</h3>
            <a href=""><i class="fab fa-facebook"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</div>
@endsection