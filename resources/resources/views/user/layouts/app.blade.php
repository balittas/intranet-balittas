<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title>BSIP-TAS </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

		<!-- CSS here -->
            <link rel="stylesheet" href="{{url('assets/frontend/css/bootstrap.min.css')}}">
            <link rel="stylesheet" href="{{url('assets/frontend/css/owl.carousel.min.css')}}">
            <link rel="stylesheet" href="{{url('assets/frontend/css/ticker-style.css')}}">
            <link rel="stylesheet" href="{{url('assets/frontend/css/flaticon.css')}}">
            <link rel="stylesheet" href="{{url('assets/frontend/css/slicknav.css')}}">
            <link rel="stylesheet" href="{{url('assets/frontend/css/animate.min.css')}}">
            <link rel="stylesheet" href="{{url('assets/frontend/css/magnific-popup.css')}}">
            <link rel="stylesheet" href="{{url('assets/frontend/css/fontawesome-all.min.css')}}">
            <link rel="stylesheet" href="{{url('assets/frontend/css/themify-icons.css')}}">
            <link rel="stylesheet" href="{{url('assets/frontend/css/slick.css')}}">
            <link rel="stylesheet" href="{{url('assets/frontend/css/nice-select.css')}}">
            <link rel="stylesheet" href="{{url('assets/frontend/css/style.css')}}">
            <link rel="stylesheet" href="{{url('assets/frontend/css/responsive.css')}}">
            @yield('css')
   </head>

   <header>
    <!-- Header Start -->
   <div class="header-area">
        <div class="main-header ">
            <div class="header-top d-none d-md-block" style="background-color: #1e2639">
               <div class="container">
                   <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li><img src="public/assets/img/icon/header_icon1.png" alt="">34ºc, Sunny </li>
                                    <li><img src="public/assets/img/icon/header_icon1.png" alt="">Tuesday, 18th June, 2019</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-social">
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                   <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                   </div>
               </div>
            </div>
            <div class="header-mid d-none d-md-block">
               <div class="container-fluid">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-12 col-lg-12 col-md-12" >
                            <div class="header-banner f-right ">
                                <img src="{{url('assets/frontend/img/banner/banner.png')}}" style="border-radius: 20px">
                            </div>
                        </div>
                    </div>
               </div>
            </div>
           <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 header-flex">
                            <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href="{{ route('artikel') }}"><img src="{{url('assets/admin/img/logo/logo.png')}}" width="200px"></a>
                                </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>
                                    <ul id="navigation">
                                        <li class="float-left"><a href="{{ route('artikel') }}"><i class="fa fa-home" style="font-size: 20px"></i></a></li>
                                        <li class="float-left"><a href="javascript:void(0)">JASA PENELITIAN</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('artikel') }}">SEMINAR</a></li>
                                                <li><a href="https://drive.google.com/file/d/1tWj7OZLFMs98Ywmr16hiH1wpiyO_1DO1/view" target="_blank">DAFTAR PATEN</a></li>
                                                <li><a href="javascript:void(0)">SK FARIETAS</a>
                                                    <ul class="submenu" style="left: 162px">
                                                        <li><a href="https://drive.google.com/drive/folders/1Bw6mhvcbToV9dVR7ZeSiCL3C9hrQQT9c" target="_blank">PEMANIS</a></li>
                                                        <li><a href="https://drive.google.com/drive/folders/1_MHunD6lM7paXnYWUK8u4KaOHJyKWZCd" target="_blank">SERAT</a></li>
                                                        <li><a href="https://drive.google.com/drive/folders/1NO05YS829Z5tBHYTNlpQONnKfqas7CDp" target="_blank">MINYAK INDUSTRI</a></li>
                                                        <li><a href="https://drive.google.com/drive/folders/17eBnA-BjrC8F444nakwux61VbP7KcpFk" target="_blank">TEMBAKAU</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="https://drive.google.com/file/d/1w_ieYcLsRBMDz0bhkbsucuKDH6uyJb4U/view" target="_blank">TEMPLATE BULETIN</a></li>
                                            </ul>
                                        </li>
                                        <li class="float-left"><a href="javascript:void(0)">TATA USAHA</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('kepegawaian') }}">KEPEGAWAIAN</a></li>
                                                <li><a href="{{ route('sdm') }}">SUMBER DAYA MANUSIA</a></li>
                                                <li><a href="{{ route('sk-table') }}">SK BSIP-TAS</a></li>
                                                <li><a href="{{ route('duk') }}">DUK</a></li>
                                                <li><a href="https://drive.google.com/file/d/1jTF-43r2hWjt9F2LTITdQ8ooWVCt3eN6/view" target="_blank">SOP KEPEGAWAIAN</a></li>

                                            </ul>
                                        </li>
                                        <li class="float-left"><a href="javascript:void(0)">PELAYANAN TEKNIK</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('format-laporan') }}">FORMAT LAPORAN</a></li>
                                                <li><a href="{{ route('format-proposal') }}">FORMAT PROPOSAL</a></li>
                                                <li><a href="{{ route('format-matrik') }}">FORMAT MATRIK</a></li>
                                                <li><a href="{{ route('format-kak') }}">FORMAT KAK</a></li>
                                                <li><a href="javascript:void(0)">FORM ISO</a>
                                                    <ul class="submenu" style="left: 162px">
                                                        <li><a href="https://drive.google.com/drive/folders/1dcVL2BnkXFSfkqtYw-M7zGKhRpWl_UJB" target="_blank">FORM RENJA</a></li>
                                                        <li><a href="https://drive.google.com/drive/folders/1MzcUoeQx9EKsH15yGEVdixgT81P64_qX" target="_blank">FORM MONEV</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="{{ route('format-lakin') }}">FORMAT LAKIN</a></li>
                                                <li><a href="{{ route('rptp-table') }}">RPTP</a></li>
                                                <li><a href="{{ route('rdhp-table') }}">RDHP</a></li>
                                            </ul>
                                        </li>
                                        <li class="float-left"><a href="#">PROGRAM</a></li>
                                        <li class="float-left"><a href="javascript:void(0)">KELOMPOK PENELITI</a>
                                            <ul class="submenu">
                                                <li><a href="javascript:void(0)">Ento-Fitopatologi</a></li>
                                            </ul>
                                        </li>
                                        @if (Auth::user() == null)
                                            <li class="float-right"><a href="{{ route('login') }}" style= "color:white; padding:15px; background-color: #1e2639; border-radius:10px; margin-top: 16px;">Login</a></li>
                                        @else
                                            <li class="float-right"><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();" style= "color:white; padding:15px; background-color: #1e2639; border-radius:10px; margin-top: 16px;">Logout</a></li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                </form>
                                        @endif
                                    </ul>
                                </nav>
                            </div>

                        </div>

                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
   </div>
    <!-- Header End -->
</header>
@yield('header')

<footer>
    <!-- footer-bottom aera -->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="footer-border">
                 <div class="row d-flex align-items-center justify-content-between">
                     <div class="col-lg-6">
                         <div class="footer-copy-right">
                             <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright BSIP-TAS&copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                         </div>
                     </div>
                     <div class="col-lg-6">
                         <div class="footer-menu f-right">
                             <ul>
                                 <li><a href="#">Terms of use</a></li>
                                 <li><a href="#">Privacy Policy</a></li>
                                 <li><a href="#">Contact</a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!-- JS here -->

		<!-- All JS Custom Plugins Link Here here -->
        <script src="{{url('./assets/frontend/js/vendor/modernizr-3.5.0.min.js')}}"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="{{url('./assets/frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{url('./assets/frontend/js/popper.min.js')}}"></script>
        <script src="{{url('./assets/frontend/js/bootstrap.min.js')}}"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="{{url('./assets/frontend/js/jquery.slicknav.min.js')}}"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{url('./assets/frontend/js/owl.carousel.min.js')}}"></script>
        <script src="{{url('./assets/frontend/js/slick.min.js')}}"></script>
        <!-- Date Picker -->
        <script src="{{url('./assets/frontend/js/gijgo.min.js')}}"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="{{url('./assets/frontend/js/wow.min.js')}}"></script>
		<script src="{{url('./assets/frontend/js/animated.headline.js')}}"></script>
        <script src="{{url('./assets/frontend/js/jquery.magnific-popup.js')}}"></script>

        <!-- Breaking New Pluging -->
        <script src="{{url('./assets/frontend/js/jquery.ticker.js')}}"></script>
        <script src="{{url('./assets/frontend/js/site.js')}}"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="{{url('./assets/frontend/js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{url('./assets/frontend/js/jquery.nice-select.min.js')}}"></script>
		<script src="{{url('./assets/frontend/js/jquery.sticky.js')}}"></script>

        <!-- contact js -->
        <script src="{{url('./assets/frontend/js/contact.js')}}"></script>
        <script src="{{url('./assets/frontend/js/jquery.form.js')}}"></script>
        <script src="{{url('./assets/frontend/js/jquery.validate.min.js')}}"></script>
        <script src="{{url('./assets/frontend/js/mail-script.js')}}"></script>
        <script src="{{url('./assets/frontend/js/jquery.ajaxchimp.min.js')}}"></script>

		<!-- Jquery Plugins, main Jquery -->
        <script src="{{url('./assets/frontend/js/plugins.js')}}"></script>
        <script src="{{url('./assets/frontend/js/main.js')}}"></script>
        @yield('footer')
</html>
