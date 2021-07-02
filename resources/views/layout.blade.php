<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sách Truyện</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet" />
    <!-- Styles từ file Public -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet" />
    <!-- Font Awasome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<style>
    body {
        font-family: sans-serif;
    }
</style>

<body>
    <div class="container">
        <!-- Menu -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
            <a class="navbar-brand m-0 p-0" href="{{url('/')}}"> <img style="margin: 0 30px 0 0"
                    src=" {{ asset('public/images/logo.png') }}" width="200px" height="100px" alt=""> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a style="font-size: 18px;" class="nav-link font-weight-bold" href="{{url('/')}}">Trang Chủ
                        </a>
                    </li>
                    <li class="nav-item active dropdown">
                        <a style="font-size: 18px;" class="nav-link dropdown-toggle font-weight-bold" href="#"
                            id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            Danh mục truyện
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($danhmuc as $key => $dm)
                            <a style="font-size: 15px;" class="dropdown-item"
                                href="{{url('danh-muc/'.$dm->slug_danhmuc)}}">{{$dm->tendanhmuc}}</a>
                            @endforeach
                        </div>
                    </li>

                    <li class="nav-item active dropdown">
                        <a style="font-size: 18px;" class="nav-link dropdown-toggle font-weight-bold " href="#"
                            id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            Thể Loại truyện
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($theloai as $key => $the)
                            <a style="font-size: 15px;" class="dropdown-item"
                                href="{{url('the-loai/'.$the->slug_theloai)}}">{{$the->tentheloai}}</a>
                            @endforeach
                        </div>
                    </li>
                </ul>
                <form autocomplete="off" class="form-inline my-2 my-lg-0" method="POST" action="{{url('tim-kiem')}}">
                    @csrf
                    <input class="form-control mr-sm-2" type="search" id="keyword" name=tukhoa
                        placeholder="vui lòng nhập vào..." aria-label="Search" />
                    <div id="search_ajax">
                    </div>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                        Tìm Kiếm
                    </button>
                </form>
            </div>
        </nav>
    </div>
    <div class="container">
        <!-- slide -->
        @yield('slide')
        <!-- content -->
        @yield('content')
    </div>
    <footer class="" style="background-color: blanchedalmond">
        <p class="float-right">
            <a href="#"><i class="fas fa-arrow-up" style="padding-right: 20px; font-size: 90px"></i></a>
        </p>
        <div class="container">
            <p>
                Website đọc truyện online đầy đủ cập nhật mới nhất 2021. Đọc
                truyện online, truyện mới, truyện full, truyện dài, truyện
                dịch convert, truyện hay, truyện chữ, tiểu thuyết. Với nhiều
                thể loại hấp dẫn truyện Tiên Hiệp, Kiếm Hiệp, truyện Ngôn
                Tình, Đam Mỹ...
            </p>
            <p class="text-center">
                &copy Copy Right Tran Long Vu - Channel: HieuTuTorial
            </p>
        </div>
    </footer>
</body>
<script src="{{ asset('js/app.js') }}" defer></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!--  nhúng slider  -->

<script type="text/javascript">
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 5,
            },
        },
    });
</script>
<!-- chọn chương -->
<script>
    $('.select-chapter').on('change', function () {
        var url = $(this).val();
        if (url) {
            window.location = url;
        }
        return false;
    });
    current_chapter();
    // ham current chapter bien url bang gia tri location
    // tim trong class select-chapter option co value bang bien url
    // gan gia tri selected cho option do
    function current_chapter() {
        var url = window.location.href;
        $('.select-chapter').find('option[value="' + url + '"]').attr("selected", true);

    }
</script>
<!-- ajax tìm kiếm -->
<script>
    $('#keyword').keyup(function () {
        var keyword = $(this).val();
        if (keyword != '') {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/timkiem-ajax')}}",
                method: "POST",
                data: { keyword: keyword, _token: _token },
                success: function (data) {
                    // alert(data);
                    $('#search_ajax').fadeIn();
                    $('#search_ajax').html(data);
                }
            });
        } else {
            $('search_ajax').fadeOut();
        }
    });
    $(document).on('click', '.li_search_ajax', function () {
        $('#keyword').val($(this).text());
        $('#search_ajax').fadeOut();

    });
    $(function () {
        $(document).click(function () {
            $('#search_ajax').hide(); //hide the button

        });
    });

</script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=360498685238202&autoLogAppEvents=1"
    nonce="Lr2TXpnB"></script>

</html>