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
	          <li class="active">
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
            <li>
              <a href="{{url('/laporanAll')}}">Laporan Keuangan</a>
	          </li>
            <li>
                <a href="{{url('/laporanProduksi')}}">Laporan Produksi</a>
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
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/dashboard')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/profile')}}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/logout')}}">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <h2 class="mb-4" style="text-align:center" >Kelola Menu</h2>

        @if (session('status'))
          <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong> {{ session('status') }}
        </div>
        @endif

        <!-- search filter sort bar -->
        <div class="row mb-3">
          <div class="col-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenu">
            Add Data
            </button>
          </div>
          <div class="col-3"> 
          </div>
          <div class="col-6">
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="searchInput" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="addMenuLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addMenuLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

              <form method="POST" action="/menuData" id="addForm">
              @csrf
                <div class="form-group">
                  <label for="name">Nama Menu</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                  <label for="price">Harga</label>
                  <input type="text" class="form-control" id="price" name="price" required>
                </div>
                <div class="form-group">
                  <label for="photo">Foto</label>
                  <input type="file" class="form-control-file" id="photo" name="photo">
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="avail" value="1" checked>
                  <label class="form-check-label" for="avail">
                    Active
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="nonavail" value="2">
                  <label class="form-check-label" for="nonavail">
                    Not Active
                  </label>
                </div>
              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary resetbtn" data-form="addForm">Reset</button>
                <input type="submit" class="btn btn-primary" value="Save changes">
              </div>

              </form>  
            </div>
          </div>
        </div>

        <div class="card-body table-full-width table-responsive">
            <table class="table table-hover table-striped tablesorter" id="mainTable">
                <thead>
                    <th>No</th>
                    <th style="cursor:pointer">Menu <span><i class="fas fa-sort"></i></span></th>
                    <th style="cursor:pointer">Harga <span><i class="fas fa-sort"></i></span></th>
                    <th>Foto</th>
                    <th>Action</th>
                </thead>
                <tbody>
                   @foreach($active as $a)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$a->nama}}@if ($a->status==1) <span class="badge badge-success">Available</span> @else <span class="badge badge-secondary">NonAvailable</span> @endif</td>
                        <td>Rp. {{$a->harga}}</td>
                        <td><img class="img-thumbnail" src="{{$a->foto}}" alt="unavailable"></td>
                        <td><button id="menutype" type="button" class="btn btn-primary" data-toggle="modal" 
                            data-target="#editMenu" data-name="{{$a->nama}}" data-price="{{$a->harga}}" data-id="{{$a->id}}" data-photo="{{$a->foto}}">
                            Edit
                            </button>
                    </tr>
                  @endforeach
                </tbody>
            </table>
            
             <!-- modal edit data -->
            <div class="modal fade" id="editMenu" tabindex="-1" role="dialog" aria-labelledby="editMenuLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editMenuLabel">Edit Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                  <form method="POST" id="editForm">
                  @csrf
                    <div class="form-group">
                      <label for="namerec">Nama Menu</label>
                      <input type="text" class="form-control" id="namerec" name="name" required>
                    </div>
                    <div class="form-group">
                      <label for="pricerec">Harga</label>
                      <input type="text" class="form-control" id="pricerec" name="price" required>
                    </div>
                    <div class="form-group">
                      <label for="photo">Foto</label><br>
                      <img class="img-thumbnail" id="img" alt="unavailable">
                      <input type="file" class="form-control-file" id="photo" name="photo">
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" id="avail" value="1" checked>
                      <label class="form-check-label" for="avail">
                        Active
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="status" id="nonavail" value="2">
                      <label class="form-check-label" for="nonavail">
                        Not Active
                      </label>
                    </div>
                  
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary resetbtn" >Reset</button>
                    <input type="submit" class="btn btn-primary" value="Save changes">
                  </div>

                  </form>
                </div>
              </div>
            </div>

            <div class="mx-5">{{ $active->links('vendor.pagination.bootstrap-4') }}</div>
        </div>
      </div>
		</div>

    <script>
      $(document).ready(function(){
        $('#editMenu').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var name = button.data('name') 
        var price = button.data('price')
        var id = button.data('id')
        var photo = button.data('photo')// Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        $("#img").attr("src",photo)
        $('#namerec').val(name)
        $('#pricerec').val(price)

        document.getElementById("editForm").action = "/menuData/"+id 
      });

        $(".resetbtn").click(function(e) {
          var formid = $(this.form).attr('id');
          document.getElementById(formid).reset();
        });
        
      })
    </script>
    
    <script src="{{URL::asset('assets1/js/popper.js')}}"></script>
    <script src="{{URL::asset('assets1/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets1/js/main.js')}}"></script>
    <script src="{{URL::asset('backendwork/search.js')}}"></script>
    <script src="https://mottie.github.io/tablesorter/js/jquery.tablesorter.js"></script>
    <script src="https://mottie.github.io/tablesorter/addons/pager/jquery.tablesorter.pager.js"></script>
    <script src="https://mottie.github.io/tablesorter/js/jquery.tablesorter.widgets.js"></script>
    
    <script>
    $(function() {
        $("#mainTable").tablesorter();
        });
    </script>
  </body>
</html>