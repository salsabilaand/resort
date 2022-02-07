<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Wisata Desa Katupat</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('pengunjung/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('pengunjung/vendors/linericon/style.css')}}">
        <link rel="stylesheet" href="{{asset('pengunjung/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('pengunjung/vendors/owl-carousel/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('pengunjung/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css')}}">
        <link rel="stylesheet" href="{{asset('pengunjung/vendors/nice-select/css/nice-select.css')}}">
        <link rel="stylesheet" href="{{asset('pengunjung/vendors/owl-carousel/owl.carousel.min.css')}}">
        <!-- main css -->
        <link rel="stylesheet" href="{{asset('pengunjung/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('pengunjung/css/responsive.css')}}">
    </head>
    <body>
        <!--================Header Area =================-->
        <header class="header_area">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="{{route('beranda-pengunjung')}}">Beranda</a></li> 
                            <li class="nav-item active"><a class="nav-link" href="{{route('tampil-penginapan')}}">Penginapan</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('riwayat-reservasi-pengunjung')}}">Riwayat Reservasi</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Akun</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="{{route('edit-akun-pengunjung')}}">Pengaturan Akun</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{route('logout')}}">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div> 
                </nav>
            </div>
        </header>
        <!--================Header Area =================-->

        <!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Penginapan</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Penginapan</a></li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->

        <!--================ Latest Blog Area  =================-->
        <section class="latest_blog_area section_gap">
            <div class="container">
                <div class="section_title text-center">
                    <h2 class="title_color">Resort Yang Tersedia</h2>
                </div>
                <div class="row mb_30">
                    @foreach ($dtPenginapan as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-recent-blog-post">
                            <div class="thumb">
                                <img class="img-fluid" src="{{asset('img/'.$item->photo)}}" alt="post">
                            </div>
                            <div class="details">
                                <a href="{{route('tampil-kamar-resort',$item->id)}}"><h4 class="sec_h4">{{$item->nama_resort}}</h4></a>
                                <p>{{$item->deskripsi}}</p>
                            </div>	
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--================ Recent Area  =================-->

        <!--================ start footer Area  =================-->	
        <footer class="footer-area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">Tentang</h6>
                            <p>Desa Katupat adalah salah satu desa di Kecamatan Togean, Kabupaten Tojo Una-Una, Provinsi Sulawesi Tengah, Indonesia.</p>
                        </div>
                    </div>											
                </div>
                <div class="border_line"></div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-8 col-sm-12 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script></p>
                    <div class="col-lg-4 col-sm-12 footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </footer>
		<!--================ End footer Area  =================-->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{asset('pengunjung/js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('pengunjung/js/popper.js')}}"></script>
        <script src="{{asset('pengunjung/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('pengunjung/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('pengunjung/js/jquery.ajaxchimp.min.js')}}"></script>
        <script src="{{asset('pengunjung/js/mail-script.js')}}"></script>
        <script src="{{asset('pengunjung/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js')}}"></script>
        <script src="{{asset('pengunjung/vendors/nice-select/js/jquery.nice-select.js')}}"></script>
        <script src="{{asset('pengunjung/js/mail-script.js')}}"></script>
        <script src="{{asset('pengunjung/js/stellar.js')}}"></script>
        <script src="{{asset('pengunjung/vendors/lightbox/simpleLightbox.min.js')}}"></script>
        <script src="{{asset('pengunjung/js/custom.js')}}"></script>
    </body>
</html>