<!doctype html>
<html lang="en">
  <head>
  	<title>Alsinsky Frozen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

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
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/profile')}}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/logout')}}">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <h2 class="mb-4" style="text-align:center">Edit Profile</h2>

        <div class="container">

        @if (session('status'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong> {{ session('status') }}
        </div>
        @endif

          <img src="assets1/images/logo.jpg" alt="Avatar" class="rounded-circle img-profile">
          <form method="POST" action="/profile">
          @csrf  
            <div class="form-group">
              <label for="fname">Name</label>
              <input type="hidden" name="iduser" value="{{$o->id}}">
              <input type="hidden" name="idstaff" value="{{$o->idkar}}">
              <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="name" value="{{$o->nama}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{$o->email}}">
            </div>
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="text" class="form-control" id="phone" placeholder="Enter phone number" name="phonenum" value="{{$o->nohp}}">
            </div>
            <div class="form-group">
              <label for="uname">User Name</label>
              <input type="text" class="form-control" id="uname" placeholder="Enter user name" name="username" value="{{$o->username}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="{{$o->password}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

          <br><br>
          <h2 class="mb-4" style="text-align:center">All User data</h2>

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUser">
              Add Data
          </button>

          <!-- Modal -->
          <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addUserLabel">Add New User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="/staff" id="adduser"> 
                @csrf  
                  <div class="form-group">
                    <label for="uname">User Name</label>
                    <input type="text" class="form-control" id="uname" name="username" placeholder="Enter user name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1"  name="password" placeholder="EnterPassword">
                  </div>
                  <div class="form-group">
                    <label for="staff">Assign Staff</label>
                    <select class="form-control dropdown-toggle" id="staff" name="staffid" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                        @foreach($staff as $s)
                        <option class="dropdown-item" value="{{$s->id}}">{{$s->nama}}</option>
                        @endforeach
                      </div>
                    </select>
                  </div>
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary resetbtn">Reset</button>
                    <input type="submit" class="btn btn-primary" value="Save changes">
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="card-body table-full-width table-responsive">
            <table class="table table-hover table-striped" id="mainTable">
                <thead>
                  <th>No</th>
                  <th>Staff Name</th>
                  <th>Staff Number</th>
                  <th>User Name</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  
                  @foreach($all as $all)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$all->nama}}@if ($all->status==1) <span class="badge badge-success">Active</span> @else <span class="badge badge-secondary">Nonactive</span> @endif</td>
                      <td>{{$all->nohp}}</td>
                      <td>{{$all->username}}</td>
                      <td><button type="button" class="btn btn-secondary">
                      Non Active</button></td>
                    </tr>  
                  @endforeach
                   
                    <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="editUserLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editUserLabel">Edit User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form method="post" action="" id="edituser">
                          @csrf   
                            <div class="form-group">
                              <label for="uname">User Name</label>
                              <input type="text" class="form-control" id="uname" placeholder="Enter user name">
                            </div>
                            <div class="form-group">
                              <label for="staff">Assign Staff</label>
                              <select class="form-control dropdown-toggle" id="staff" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                  @foreach($staff as $s)
                                  <option class="dropdown-item" value="{{$s->id}}">{{$s->nama}}</option>
                                  @endforeach
                                </div>
                              </select>
                              <!-- <input name="menu_id" type="hidden" id="menuselected"> -->
                            </div>
                          </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary resetbtn">Reset</button>
                              <input type="submit" class="btn btn-primary" value="Save changes">
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>
                </tbody>
            </table>
        </div>

        </div>
      </div>
		</div>

  
    </script>
    
    <script src="{{URL::asset('assets1/js/popper.js')}}"></script>
    <script src="{{URL::asset('assets1/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets1/js/main.js')}}"></script>
  </body>
</html>