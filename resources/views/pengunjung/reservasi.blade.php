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
                            <li class="nav-item active"><a class="nav-link" href="accomodation.html">Penginapan</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Akun</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="{{route('edit-akun-pengunjung')}}">Pengaturan Akun</a></li>
                                    <li class="nav-item"><a class="nav-link" href="blog-single.html">Riwayat Reservasi</a></li>
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

        <div class="whole-wrap">
            <div class="container">
                <div class="section-top-border">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <h3 class="mb-30 title_color">Form Element</h3>
                            @foreach ($dtKamar as $item)
                            <form action="{{route('reservasi-proses', $item->id)}}" method="POST">
                                @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                @if(Session::has('fail'))
                                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                @endif
                                @csrf
                                <div class="form-group first">
                                    <label for="nama">Name</label>
                                    <input type="text" name="nama" value="{{old('nama')}}" id="nama" class="form-control">
                                    <span class="text-danger">@error('nama') {{$message}} @enderror</span>
                                </div>
                                <div class="form-group first">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{old('email')}}" id="email"  class="form-control">
                                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="telepon">Telepon</label>
                                    <input type="text" name="telepon" value="{{old('telepon')}}" id="telepon" class="form-control">
                                    <span class="text-danger">@error('telepon') {{$message}} @enderror</span>
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="catatan">Catatan</label>
                                    <input type="text" name="catatan" value="{{old('catatan')}}" id="catatan" class="form-control">
                                    <span class="text-danger">@error('telepon') {{$message}} @enderror</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                      <label for="tgl_masuk">Tanggal Check In</label>
                                      <input required type="date" id="tgl_masuk" name="tgl_masuk" class="form-control">
                                    </div>
                                    <div class="col-md-6 form-group">
                                      <label for="tgl_keluar">Tanggal Check Out</label>
                                      <input required type="date" id="tgl_keluar" name="tgl_keluar" class="form-control">
                                    </div>
                                </div>
                                <div class="button-group-area">
                                    <input type="submit" class="genric-btn success"></button>
                                </div>
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

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