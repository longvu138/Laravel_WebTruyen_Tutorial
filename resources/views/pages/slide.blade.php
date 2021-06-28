 <!-- slider -->
 <hr>
 <h1> Sách Nên Đọc</h1>

<div class="owl-carousel owl-theme mt-3">
    @foreach($truyen as $key => $value)
    <div class="item">
        <img  height="300px" src=" {{ asset('public/uploads/truyen/'.$value->hinhanh) }}" alt="">
        <h3 class="mt-2">{{$value->tentruyen}}</h3>
        <p><i class="fas fa-eye"></i> 500 </p>
        <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="btn btn-danger btn-sm">Đọc Ngay</a>
    </div>
    @endforeach
</div>

