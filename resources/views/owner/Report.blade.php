<!doctype html>
<html lang="en">
  <head>
  	<title>Alsinsky Frozen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{URL::asset('assets1/css/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(assets1/images/logo.jpg);"></a>
	        <ul class="list-unstyled components mb-5">
	          <li>
	            <a href="{{url('/menuData')}}">Kelola Menu</a>
	          </li>
	          <li>
	              <a href="{{url('/karyawanData')}}">Data Karyawan</a>
	          </li>
	          <li>
              <a href="{{url('/operasionalData')}}">Data Operasional</a>
	          </li>
            <li>
              <a href="{{url('/bahanData')}}">Data Bahan Baku</a>
	          </li>
	          <li>
              <a href="{{url('/resepData')}}">Data Menu & Resep</a>
	          </li>
	          <li>
              <a href="{{url('/stokData')}}">Stok Menu</a>
            </li>
            <li>
              <a href="{{url('/laporanData')}}">Laporan Transaksi</a>
            </li>
            <li class="active">
              <a href="{{url('/laporanAll')}}">Laporan Keuangan</a>
	          </li>
            <li>
              <a href="{{url('/topData')}}">Top Menu</a>
	          </li>
	        </ul>

	        <div class="footer">
	        	<!-- <p>Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
						  Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <h2 class="mb-4" style="text-align:center">Laporan Keuangan</h2>

        <div class="container">
          <div class="row">
            <div class="col-3">
              <div class="card">
                <i class="fas fa-chart-line fa-10x"></i>
                <div class="card-body justify-content-center">
                  <h5 class="card-title">Pemasukan</h5>
                  <p class="card-text">Rp 50.000.000</p>
                </div>
              </div>
            </div>

            <div class="col-3">
              <div class="card">
                <i class="fas fa-chart-bar fa-10x"></i>
                <div class="card-body">
                  <h5 class="card-title">Pengeluaran</h5>
                  <p class="card-text">Rp 50.000.000</p>
                </div>
              </div>
            </div>

            <div class="col-3">
              <div class="card">
                <i class="fas fa-chart-area fa-10x"></i>
                <div class="card-body">
                  <h5 class="card-title">Laba Bersih</h5>
                  <p class="card-text">Rp 50.000.000</p>
                </div>
              </div>
            </div>

            <div class="col-3">
              <div class="card">
                <i class="fas fa-chart-pie fa-10x"></i>
                <div class="card-body">
                  <h5 class="card-title">Tanggungan</h5>
                  <p class="card-text">Rp 50.000.000</p>
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="card-body table-full-width table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <th>No</th>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    <tr>
                        <td>asdasd</td>
                        <td>asd</td>
                        <td>sddsf</td>
                         <td><img class="img-thumbnail" src="" alt="photo"></td>
                        <td>Available</td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
		</div>

    <script>
     
    </script>
    
    <script src="{{URL::asset('assets1/js/popper.js')}}"></script>
    <script src="{{URL::asset('assets1/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets1/js/main.js')}}"></script>
  </body>
</html>