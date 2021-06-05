<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Alsinsky Frozen</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ URL::asset('assetcust/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ URL::asset('assetcust/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{URL::asset('assetcust/css/responsive.css')}}">
    <!-- fevicon -->
    <link rel="icon" href="{{URL::asset('assetcust/images/fevicon.png')}}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{URL::asset('assetcust/css/jquery.mCustomScrollbar.min.css')}}">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      <!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <!-- <div class="loader_bg">
        <div class="loader"><img src="{{URL::asset('assetcust/loading.gif')}}" alt="#" /></div>
    </div> -->
    <!-- end loader -->
    <!-- header -->
    <header id="home">
        <!-- header inner -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo"> <a href="{{url('/home')}}"><h3>Alsinsky Frozen</h3></a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li class="active"><a href="#home">Home</a></li>
                                        <li><a href="#about">About Us</a></li>
                                        <li><a href="#fruits">Menu</a></li>
                                        <li><a href="#contact">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header inner -->
    </header>
    <!-- end header -->


    <section class="slider_section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="full">
                        <h1><br>Alsinsky Frozen</h1>
                            <p>Semua produk yang kami jual selalu mengutamakan kebersihan dan kenikmatan setiap gigitannya. Kami selalu membuat produk tersebut fresh dan dibuat tanpa bahan pengawet apapun.</p>
                            <div class="full margin_top_30"><a class="ord_bt" href="https://api.whatsapp.com/send?phone=628125224232&text=Halo%20Admin,%20saya%20mau%20order">Order Here!</a></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="full text_align_center">
                        <img class="slide_img" src="{{URL::asset('assetcust/img/bgs.png')}}" alt="#" /> 
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- about -->
    <div id="about" class="about layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-responsive" src="{{URL::asset('assetcust/img/abt.jpg')}}" alt="#" />
                </div>
                <div class="col-md-6">
                    <div class="heading margin_top_30">
                        <h2>About our shop</h2>
                    </div>
                    <div class="full margin_top_20">
                        <p>Alshinky Frozen merupakan UMKM Home Industry yang bergerak dalam sektor food and beverage yang beralamatkan di Jalan Sanan No 61 Malang. Alshinky Frozen sudah berdiri sejak tahun 2010 hingga sekarang. Produk yang kami jual adalah produk yang berkualitas,higienis dan 100% halal. Sudah banyak distributor yang bekerja sama dengan Alshinky Frozen salah satunya adalah UMKM kripik tempe sanan, dengan begitu berarti Alshinky Frozen merupakan usaha yang sudah dipercaya oleh sebagian masyarakat di Kota Malang. </p>
                    </div>
                    <div class="full margin_top_30">
                        <a class="main_bt" href="#">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end about -->
    <!-- section -->
    <div id="fruits" class="section dark_bg layout_padding left_white">
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                    <div class="heading full text_align_center">
                        <h2 class="white_font full text_align_center">Our Menu</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="myCarousel" class="col-md-12 carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">
                        @foreach($menu[0] as $m)
                            <div class="col-md-4 margin_top_30">
                                <div class="full fr">
                                    <img class="img-responsive" src="{{$m->foto}}" alt="#" />
                                </div>
                                <div class="full text_align_center">
                                    <h3 class="white_font">{{$m->nama}}<br><strong class="theme_blue">Rp. {{$m->harga}}</strong></h3>
                                </div>   
                            </div>
                        @endforeach
                        </div>
                        @for ($i = 1; $i < sizeof($menu); $i++)
                        <div class="item">
                            @foreach($menu[$i] as $m)
                            <div class="col-md-4 margin_top_30">
                                <div class="full fr">
                                    <img class="img-responsive" src="{{$m->foto}}" alt="#" />
                                </div>
                                <div class="full text_align_center">
                                    <h3 class="white_font">{{$m->nama}}<br><strong class="theme_blue">Rp. {{$m->harga}}</strong></h3>
                                </div>   
                            </div>
                            @endforeach
                        </div>
                        @endfor
                    </div>
                    
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                  </a>
               
            </div>
        </div>
    </div>
    <br><br><br>
    <!-- end section -->

    <!-- footer -->
    <footer>
        <div id="contact" class="footer layout_padding">
            <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <h3>Our social Media</h3>
                            <p>Instagram</p>
                            <p>@Dapoer.yenny</p>
                        </div>
                        
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <h3>Address</h3>
                            <p>Sanan</p>
                            <p>Malang, Jawa Timur</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <h3>Opening Hours</h3>
                            <p>Mon-Thur: 07:00 AM - 07:00 PM</p>
                            <p>Fri-Sun: 07:00 AM - 05:00 PM</p>
                        </div>
                    </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <p>Copyright 2021 All Right Reserved By <a href="https://github.com/amelrnt/">arn.co</a></p>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>

    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>