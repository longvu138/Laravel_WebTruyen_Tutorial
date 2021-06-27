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

<body>
    <div class="container">
        <!-- Menu -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
            <a class="navbar-brand" href="#">Sách Truyện </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{'/'}}">Trang Chủ
                            <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Danh mục truyện
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           @foreach($danhmuc as $key => $dm)
                            <a class="dropdown-item" href="{{url('danh-muc/'.$dm->slug_danhmuc)}}">{{$dm->tendanhmuc}}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Thể Loại truyện
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Tên Danh Mục</a>
                            <a class="dropdown-item" href="#">Another action</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                        Search
                    </button>
                </form>
            </div>
        </nav>
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

</html>