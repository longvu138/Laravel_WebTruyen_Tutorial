@extends('../layout')

@section('content')

<h1 style="margin-top: 50px;">Sách Mới Cập Nhật</h1>
<hr>
<div class="album py-5 bg-light">

    <div class="container">
        <div class="row ">
            @foreach($sach as $key => $value)
            <div class="col-md-3 ">
                <div class="card mb-3 box-shadow">
                    <img class="card-img-top img-responsive" src=" {{ asset('/uploads/sach/'.$value->hinhanh) }}">

                    <div class="card-body p-3 ">
                        <h5 style="height: 40px;">{{ $value->tensach}}</h5>
                        <!-- cắt chuỗi tóm tắt  -->
                        @php
                        $tomtat =substr( $value->tomtat ,0,50).'...';
                        @endphp
                        <!-- kết thúc cắt chuỗi tóm tắt -->
                        <p style="height: 40px;" class="card-text"> {{$tomtat}} </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">

                                <form action="">
                                    @csrf
                                    <!-- Button trigger modal -->
                                    <a id="{{$value->id}}" type="button"
                                        class="btn btn-sm btn-default  btn-outline-secondary xemsachnhanh"
                                        data-toggle="modal" data-target="#exampleModalLong">
                                        Đọc Ngay
                                    </a>
                                    <a class="btn btn-sm btn-outline-secondary"> <i class="fas fa-eye"></i> 50</a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                        <div id="tieudesach">

                                                        </div>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="noidungsach"></div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    <!-- <small class="text-muted"> {{$value->created_at->diffForHumans() }}</small> -->

                </div>
                </a>
            </div>
        </div>
        @endforeach

    </div>

    @endsection