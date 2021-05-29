<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Alsinsky Frozen</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="{{URL::asset('assets/img/favicon.ico')}}" type="image/x-icon">
<link rel="apple-touch-icon" href="{{URL::asset('assets/img/apple-touch-icon.png')}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{URL::asset('assets/img/apple-touch-icon-72x72.png')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{URL::asset('assets/img/apple-touch-icon-114x114.png')}}">

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="{{URL::asset('assets/css/style.css')}}">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Rochester" rel="stylesheet">

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation
    ==========================================-->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#restaurant-menu" class="page-scroll">Menu</a></li>
        <li><a href="#about" class="page-scroll">About</a></li>
        <li><a href="#team" class="page-scroll">Chef</a></li>
        <li><a href="#contact" class="page-scroll">Contact</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
</nav>
<!-- Header -->
<header id="header">
  <div class="intro">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="intro-text">
            <h1>Alshinky Frozen</h1>
            <p></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Features Section -->
<div id="features" class="text-center">

  <div class="container">
    <div class="section-title">
        <h2>Our Menu</h2>
    </div>
    <div class="row" id="restaurant-menu">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            @foreach($menu[0] as $m)
              <div class="col-xs-12 col-sm-4">
                <div class="features-item">
                  <h3>{{$m->nama}}</h3>
                  <img src="{{$m->foto}}" class="img-responsive" alt="">
                  <p>Rp. {{$m->harga}}</p>
                </div>
              </div>
            @endforeach
            </div>
          @for ($i = 1; $i < sizeof($menu); $i++)
            <div class="item">
            @foreach($menu[$i] as $m)
              <div class="col-xs-12 col-sm-4">
                <div class="features-item">
                  <h3>{{$m->nama}}</h3>
                  <img src="{{$m->foto}} " class="img-responsive" alt="">
                  <p>Rp. {{$m->harga}}</p>
                </div>
              </div>
            @endforeach
            </div>
          @endfor
        </div>

        <!-- Left and right controls -->
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
     
    

    <button type="submit" class="btn btn-custom btn-lg"><a href="https://api.whatsapp.com/send?phone=628125224232&text=Halo%20Admin,%20saya%20mau%20order">Order Here!</button>
  </div>

  </div>
</div>

<!-- About Section -->
<div id="about">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-md-6 about-img"> </div>
      <div class="col-xs-12 col-md-3 col-md-offset-1">
        <div class="about-text">
          <div class="section-title">
            <h2>Our Story</h2>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare diam commodo nibh.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Team Section -->
<div id="team">
  <div class="container">
    <div id="row">
      <div class="col-md-6">
        <div class="col-md-10 col-md-offset-1">
          <div class="section-title">
            <h2>Our Kitchen</h2>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare diam commodo nibh.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="team-img"><img src="{{URL::asset('assets/img/1.jpg')}}" alt="..."></div>
      </div>
    </div>
  </div>
</div>
<!-- Contact Section -->
<div id="contact" class="text-center">
  <div class="container text-center">
    <div class="col-md-4">
      <h3>Reservations</h3>
      <div class="contact-item">
        <p>Please call</p>
        <p>(887) 654-3210</p>
      </div>
    </div>
    <div class="col-md-4">
      <h3>Address</h3>
      <div class="contact-item">
        <p>4321 California St,</p>
        <p>San Francisco, CA 12345</p>
      </div>
    </div>
    <div class="col-md-4">
      <h3>Opening Hours</h3>
      <div class="contact-item">
        <p>Mon-Thurs: 10:00 AM - 11:00 PM</p>
        <p>Fri-Sun: 11:00 AM - 02:00 AM</p>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="{{URL::asset('assets/js/main.js')}} "></script>
</body>
</html>
