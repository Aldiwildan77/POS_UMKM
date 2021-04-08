<!doctype html>
<html lang="en">
  <head>
  	<title>Alsinsky Frozen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{URL::asset('assets1/css/style.css')}}">

        <!-- grafik -->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('assets3/bootstrap/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('assets3/font-awesome/css/font-awesome.min.css')}}" />

        <script type="text/javascript" src="{{URL::asset('assets3/js/jquery-1.10.2.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('assets3/bootstrap/js/bootstrap.min.js')}}"></script>
        <!-- end -->

        <!-- chart req -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js" integrity="sha256-9CKDuBNIQo/dQgrK9nyK+XcD2MBjb0JgnPMANrQw6Cs=" crossorigin="anonymous"></script>
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
                    <li class="active">
                        <a href="{{url('/laporanData')}}">Laporan Transaksi</a>
                    </li>
                    <li class="active">
                        <a href="{{url('/laporanAll')}}">Laporan Keuangan</a>
                    </li>
                    <li>
                        <a href="{{url('/topData')}}">Top Menu</a>
                    </li>
                    </ul>
                </div>
            </nav>
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
                    <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <h2 class="mb-4" style="text-align:center" >Laporan Transaksi</h2>
        <div class="search-container">

        <!-- Bootstrap Charts - START -->
            
            <div class="row table-responsive">
                <canvas id="myChart" width="500" height="200"></canvas>
            </div>

            <div class="row">
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Pembayaran</th>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th>QTY</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            @foreach($transaksi as $t)
                            <tr>
                                <td>{{$t->id}}</td>
                                <td>{{$t->nama}}</td>
                                <td>{{$t->no_hp}}</td>
                                <td>{{$t->metode}}</td>
                                <td>{{$t->menu}}</td>
                                <td>{{$t->harga}}</td>
                                <td>{{$t->qty}}</td>
                                <td>{{$t->total}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                    }
                }
            });
            </script>
            <!-- Bootstrap Charts - END -->
            </div>

    <script src="{{URL::asset('assets1/js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('assets1/js/popper.js')}}"></script>
    <script src="{{URL::asset('assets1/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets1/js/main.js')}}"></script>
  </body>
</html>