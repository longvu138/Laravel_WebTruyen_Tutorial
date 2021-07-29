<!-- slider -->

<h1 class=" mt-4"> Sách Nên Đọc</h1>
<hr>
<div class="owl-carousel owl-theme mt-3 img-fluid">
    @foreach($truyen as $key => $value)
    <div class=" item p-1 ">
        <a href=" {{url('xem-truyen/'.$value->slug_truyen)}}">
            <img class=" card-img-top img-responsive" src=" {{ asset('uploads/truyen/'.$value->hinhanh) }}"
                alt=""></a>
        <p style="height: 50px;" class="mt-2 text-capitalize"><a
                href="{{url('xem-truyen/'.$value->slug_truyen)}}">{{$value->tentruyen}}</a></p>
        <!-- <p><i class="fas fa-eye"></i> 500 </p> -->
        <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="btn btn-danger btn-sm">Đọc Ngay</a>
    </div>
    @endforeach
</div>