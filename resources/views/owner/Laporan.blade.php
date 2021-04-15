<!doctype html>
<html lang="en">
  <head>
  	<title>Alsinsky Frozen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="{{URL::asset('assets1/css/style.css')}}">

        <script type="text/javascript" src="{{URL::asset('assets3/js/jquery-1.10.2.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('assets3/bootstrap/js/bootstrap.min.js')}}"></script>
        <!-- end -->

        <!-- chart req -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js" integrity="sha256-9CKDuBNIQo/dQgrK9nyK+XcD2MBjb0JgnPMANrQw6Cs=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{URL::asset('assets1/css/style.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
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
                    <li class="active">
                        <a href="{{url('/laporanData')}}">Laporan Transaksi</a>
                    </li>
                    <li>
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
                        <th>QTY</th>
                        <th>Total</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach($transaksi as $t)
                        <tr>
                            <td>{{$t->id}}</td>
                            <td>{{$t->nama}}</td>
                            <td>{{$t->no_hp}}</td>
                            <td>{{$t->metode}}</td>
                            <td>{{$t->menu}}</td>
                            <td>{{$t->qty}}</td>
                            <td>{{$t->nominal}}</td>
                            <td><div style="background-color: green;width: max-content;"><span class="mx-1">Delivered</span></div>
                            </td>
                            <td class="dropdown show">
                                <a class="fas fa-ellipsis-v" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" data-toggle="modal" data-target="#viewModal" href="#viewModal"
                                        data-id="{{$t->id}}" data-name="{{$t->nama}}" data-phone="{{$t->no_hp}}" data-pm="{{$t->metode}}"
                                        data-menu="{{$t->menu}}" data-qty="{{$t->qeach}}" data-total="{{$t->nominal}}" >
                                        View Detail</a>
                                    <a class="dropdown-item" data-toggle="modal" data-target="#editModal" href="#editModal"
                                        data-id="{{$t->id}}" data-name="{{$t->nama}}" data-phone="{{$t->no_hp}}" data-pm="{{$t->metode}}"
                                        data-menu="{{$t->menu}}" data-qty="{{$t->qeach}}" data-total="{{$t->nominal}}" >
                                        Edit Status</a>
                                </div>
                            </td>

                            <!-- Modal view-->
                            <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewModalLabel">Transaction id {{$t->id}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <label for="namerec">Nama Pemesan</label>
                                                    <input type="text" class="form-control" id="namerec" value="{{$t->nama}}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phonerec">No hp</label>
                                                    <input type="text" class="form-control" id="phonerec" value="{{$t->no_hp}}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="addrrec">Alamat</label>
                                                    <input type="text" class="form-control" id="addrrec" value="Malang" disabled>
                                                </div>
                                                <div class="form-group" id="menudetail">
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label for="payrec">Total</label>
                                                    <input type="text" class="form-control" id="payrec" value="{{$t->nominal}}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="statusrrec">Status</label>
                                                    <input type="text" class="form-control" id="statusrrec" value="Delivered" disabled>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal edit-->
                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Transaction id xxx</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <label for="namerecx">Nama Pemesan</label>
                                                    <input type="text" class="form-control" id="namerecx" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phonerecx">No hp</label>
                                                    <input type="text" class="form-control" id="phonerecx" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="addrrecx">Alamat</label>
                                                    <input type="text" class="form-control" id="addrrecx" disabled>
                                                </div>
                                                <div class="form-group" id="menudetailx">
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label for="payrec">Total</label>
                                                    <input type="text" class="form-control" id="payrec" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="statusrrec">Status</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            Proccessed
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            On the way
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                        <label class="form-check-label" for="exampleRadios2">
                                                            Delivered
                                                        </label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

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

    <script src="{{URL::asset('backendwork/trxhandler.js')}}"></script>
  </body>
</html>