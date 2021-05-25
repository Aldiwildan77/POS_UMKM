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
	          <li class="active">
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

        <h2 class="mb-4" style="text-align:center">Data Karyawan</h2>

        @if (session('status'))
          <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong> {{ session('status') }}
        </div>
        @endif

        <!-- search bar -->
         <div class="row">
          <div class="col-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStaff">
              Add Data
            </button>
          </div>
          <div class="col-4">
          </div>
          <div class="col-4">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search" id="searchInput" aria-label="Search" aria-describedby="button-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addStaff" tabindex="-1" role="dialog" aria-labelledby="addStaffLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addStaffLabel">Add New Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

              <form method="POST" action="/karyawanData">
              @csrf
                <div class="form-group">
                  <label for="name">Nama Karyawan</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                  <label for="phone">No Hp</label>
                  <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                  <label for="salary">Gaji</label>
                  <input type="text" class="form-control" id="salary" name="salary" required>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                  <label class="form-check-label" for="exampleRadios1">
                    Active
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                  <label class="form-check-label" for="exampleRadios2">
                    Not Active
                  </label>
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
            <table class="table table-hover table-striped tablesorter" id="mainTable">
                <thead>
                    <th>Id</th>
                    <th style="cursor:pointer">Nama <span><i class="fas fa-sort"></i></span></th>
                    <th>No HP</th>
                    <th>Email</th>
                    <th style="cursor:pointer">Gaji <span><i class="fas fa-sort"></i></span></th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($active as $a)
                    <tr>
                        <td>{{$a->id}}</td>
                        <td>{{$a->nama}}</td>
                        <td>{{$a->nohp}}</td>
                        <td>{{$a->email}}</td>
                        <td>Rp {{$a->gaji}}</td>
                        <td>Active</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editStaff" 
                        data-id="{{$a->id}}" data-name="{{$a->nama}}" data-phone="{{$a->nohp}}" data-email="{{$a->email}}" data-salary="{{$a->gaji}}">
                              edit
                            </button>
                        </td>    

                            <!-- Modal -->
                            <div class="modal fade" id="editStaff" tabindex="-1" role="dialog" aria-labelledby="editStafffLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="editStaffLabel">Edit Staff data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">

                                  <form method="POST" id="editForm">
                                  @csrf
                                    <div class="form-group">
                                      <label for="name">Nama Karyawan</label>
                                      <input type="text" class="form-control" id="namerec" name="name" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="phone">No Hp</label>
                                      <input type="text" class="form-control" id="phonerec" name="phone" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="email">Email</label>
                                      <input type="email" class="form-control" id="emailrec" name="email" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="salary">Gaji</label>
                                      <input type="text" class="form-control" id="salaryrec" name="salary" required>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="statusRadios" id="availrec" value="1" checked>
                                      <label class="form-check-label" for="availrec">
                                        Active
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="statusRadios" id="nonavailrec" value="0">
                                      <label class="form-check-label" for="nonavailrec">
                                        Not Active
                                      </label>
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

                        
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mx-5">{{ $active->links('vendor.pagination.bootstrap-4') }}</div> 
        </div>
      </div>
		</div>

    <script>
      $(document).ready(function(){
        $('#editStaff').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var name = button.data('name') // Extract info from data-* attributes 
        var phone = button.data('phone')
        var email = button.data('email')
        var salary = button.data('salary')
        var id = button.data('id')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        $('#namerec').val(name)
        $('#phonerec').val(phone)
        $('#emailrec').val(email)
        $('#salaryrec').val(salary)

        document.getElementById("editForm").action = "/karyawanData/"+id; 
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