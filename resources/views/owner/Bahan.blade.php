<!doctype html>
<html lang="en">
  <head>
  	<title>Alsinsky Frozen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <li class="active">
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

        <h2 class="mb-4" style="text-align:center" >Data Bahan Baku</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStock">
          Add Data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addStock" tabindex="-1" role="dialog" aria-labelledby="addStockLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addStockLabel">Add New Stock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

              <form method="POST" action="/bahanData">
              @csrf
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                  <label for="qty">Jumlah </label>
                  <input type="text" class="form-control" id="qty" name="qty">
                </div>
                <div class="form-group">
                  <label class="control-label" for="date">Date</label>
                  <input class="form-control" id="date" name="date" placeholder="YYY/MM/DD" type="text"/>
                </div>
                <div class="form-group">
                  <label for="photo">Fraktur</label>
                  <input type="file" class="form-control-file" id="photo" name="photo">
                </div>
              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Reset</button>
                <input type="submit" class="btn btn-primary" value="Save changes">
              </div>

              </form>
            </div>
          </div>
        </div>
        
        <div class="card-body table-full-width table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <th>No</th>
                    <th>Bahan</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($stok as $s)
                    <tr>
                        <td>{{$s->id}}</td>
                        <td>{{$s->nama}}</td>
                        <td>{{$s->jumlah}}</td>
                        <td>Kg</td>
                        <td>Safe Available</td>
                        <td><a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#editStock" data-name="{{$s->nama}}" data-qty="{{$s->jumlah}}">Edit</a>
                        
                         <!-- Modal Edit-->
                        <div class="modal fade" id="editStock" tabindex="-1" role="dialog" aria-labelledby="editStockLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="editStockLabel">Edit Stock</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                              <form>
                                <div class="form-group">
                                  <label for="namerec">Nama</label>
                                  <input type="text" class="form-control" id="namerec" value="{{$s->nama}}">
                                </div>
                                <div class="form-group">
                                  <label for="qtyrec">Jumlah </label>
                                  <input type="text" class="form-control" id="qtyrec" value="{{$s->jumlah}}">
                                </div>
                                <div class="form-group">
                                  <label class="control-label" for="date">Date</label>
                                  <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
                                </div>
                                <div class="form-group">
                                  <label for="photo">Fraktur</label>
                                  <input type="file" class="form-control-file" id="photo">
                                </div>
                              </form>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Reset</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

      </div>
		</div>

    <script>
      $(document).ready(function(){
        $('#editStock').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var name = button.data('name') 
        var qty = button.data('qty')// Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        $('#namerec').val(name)
        $('#qtyrec').val(qty)
        });
    })
    </script>

    <script src="{{URL::asset('assets1/js/popper.js')}} "></script>
    <script src="{{URL::asset('assets1/js/bootstrap.min.js')}} "></script>
    <script src="{{URL::asset('assets1/js/main.js')}} "></script>
  </body>
</html>