<!doctype html>
<html lang="en">
  <head>
  	<title>Alsinky Frozen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{URL::asset('assets1/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
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
	          <li class="active">
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

        <h2 class="mb-4" style="text-align:center" >Data Operasional</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addOperational">
          Add Data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addOperational" tabindex="-1" role="dialog" aria-labelledby="addOperationalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addOperationalLabel">Add Operational data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

              <form method="POST" action="/operasionalData">
              @csrf
                <div class="form-group">
                  <label for="desc">Keterangan</label>
                  <input type="text" class="form-control" id="desc" name="desc">
                </div>
                <div class="form-group">
                  <label for="price">Biaya</label>
                  <input type="text" class="form-control" id="price" name="price">
                </div>
                <div class="form-group">
                  <label class="control-label" for="date">Date</label>
                  <input class="form-control" id="date" name="date" placeholder="YYYY/MM/DD" type="text"/>
                </div>
                <div class="form-group">
                  <label for="photo">Fraktur</label>
                  <input type="file" class="form-control-file" id="photo">
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
                    <th>id</th>
                    <th>Keterangan</th>
                    <th>Biaya</th>
                    <th>Tanggal</th>
                    <th>Fraktur</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($oprerasional as $o)
                    <tr>
                        <td>{{$o->id}}</td>
                        <td>{{$o->keterangan}}</td>
                        <td>Rp. {{$o->biaya}}</td>
                        <td>{{$o->tanggal}}</td>
                        <td>{{$o->fraktur_id}}</td>
                        <td><button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#editOperational" data-id="{{$o->id}}" data-desc="{{$o->keterangan}}" data-price="{{$o->biaya}}" data-date="{{$o->tanggal}}">
                            edit</button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="editOperational" tabindex="-1" role="dialog" aria-labelledby="editOperationalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="editOperationalLabel">Edit data operasional</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                              <form method="POST" action="">
                              @csrf
                                <div class="form-group">
                                  <label for="desc">Keterangan</label>
                                  <input type="text" class="form-control" id="descrec" name="desc">
                                </div>
                                <div class="form-group">
                                  <label for="price">Biaya</label>
                                  <input type="text" class="form-control" id="pricerec" name="price">
                                </div>
                                <div class="form-group">
                                  <label class="control-label" for="date">Date</label>
                                  <input class="form-control" id="date" name="daterec" placeholder="YYYY/MM/DD" type="text"/>
                                </div>
                                <div class="form-group">
                                  <label for="photo">Fraktur</label>
                                  <input type="file" class="form-control-file" id="photorec">
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
      $('#editOperational').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var desc = button.data('desc') 
      var price = button.data('price')
      var date = button.data('date')// Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      $('#descrec').val(desc)
      $('#pricerec').val(price)
      $('#daterec').val(date)
      });

      var date_input=$('input[id="date"]'); //our date input has the id "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      date_input.datepicker({
          format: 'yyyy/mm/dd',
          container: container,
          todayHighlight: true,
          autoclose: true,
      });
    })
    </script>

    <script src="{{URL::asset('assets1/js/popper.js')}}"></script>
    <script src="{{URL::asset('assets1/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets1/js/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
  </body>
</html>