<!doctype html>
<html lang="en">
  <head>
  	<title>Alsinky Frozen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
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

        <h2 class="mb-4" style="text-align:center" >Data Operasional</h2>

        @if (session('status'))
          <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong> {{ session('status') }}
        </div>
        @endif

       <!-- search filter sort bar -->
       <div class="row mb-3">
          <div class="col-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addOperational">
            Add Data
            </button>
          </div>
          <div class="col-4">
            <button class="btn btn-primary" id="pdfexport">To PDF</button>
            <!-- <div class="row">
              <div class="col-6 ml-0">
                <label for="filter">Filter by Date</label>
              </div>
              <div class="col-6">
                <input class="form-control" id="date" name="date" placeholder="all" type="text"/>
              </div>
            </div>  -->
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

              <form method="POST" action="/operasionalData" id="addData">
              @csrf
                <div class="form-group">
                  <label for="desc">Keterangan</label>
                  <input type="text" class="form-control" id="desc" name="desc" required>
                </div>
                <div class="form-group">
                  <label for="price">Biaya</label>
                  <input type="text" class="form-control" id="price" name="price" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="date">Date</label>
                  <input class="form-control" id="date" name="date" placeholder="YYYY/MM/DD" type="text" required/>
                </div>
                <div class="form-group">
                  <label for="photo">Fraktur</label>
                  <input type="file" class="form-control-file" id="photo" name="fraktur">
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
            <table class="table table-hover table-striped tablesorter" id="mainTable">
                <thead>
                    <th style="cursor:pointer">No<i class="fas fa-sort"></th>
                    <th style="cursor:pointer">Keterangan<span><i class="fas fa-sort"></i></span></th>
                    <th style="cursor:pointer">Biaya<span><i class="fas fa-sort"></i></span></th>
                    <th style="cursor:pointer">Tanggal<span><i class="fas fa-sort"></i></span></th>
                    <th>Fraktur</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($operasional as $o)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$o->keterangan}}</td>
                        <td>Rp. {{$o->biaya}}</td>
                        <td>{{$o->tanggal}}</td>
                        <td><img class="img-thumbnail" src="{{$o->foto}}" alt="unavailable"></td>
                        <td><button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#editOperational" 
                        data-id="{{$o->id}}" data-desc="{{$o->keterangan}}" data-price="{{$o->biaya}}" data-date="{{$o->tanggal}}" data-fraktur="{{$o->foto}}">
                            Edit</button>
                        </td>

                      <!-- Modal -->
            <div class="modal fade" id="editOperational" tabindex="-1" role="dialog" aria-labelledby="editOperationalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editOperationalLabel">Edit data operasional <span id="idoperasional"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                  <form method="POST" id="editForm">
                  @csrf
                    <div class="form-group">
                      <label for="desc">Keterangan</label>
                      <input type="text" class="form-control" id="descrec" name="desc" required>
                    </div>
                    <div class="form-group">
                      <label for="price">Biaya</label>
                      <input type="text" class="form-control" id="pricerec" name="price" required>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="date">Date</label>
                      <input class="form-control" id="daterec" name="date" type="text" required/>
                    </div>
                    <div class="form-group">
                      <label for="photo">Fraktur</label><br>
                      <img class="img-thumbnail" id="fraktur" alt="unavailable">
                      <input type="file" class="form-control-file" id="photorec" name="fraktur">
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
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mx-5">{{ $operasional->links('vendor.pagination.bootstrap-4') }}</div>
        </div>
      </div>
		</div>

    <script>
    $(document).ready(function(){
      $('#editOperational').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var desc = button.data('desc') 
      var price = button.data('price')
      var date = button.data('date')
      var id = button.data('id')
      var fraktur = button.data('fraktur')// Extract info from data-* attributes
      $("#fraktur").attr("src",fraktur)
      $('#descrec').val(desc)
      $('#pricerec').val(price)
      $('#daterec').val(date)
      $('#idoperasional').text(id)
      $('#editForm').attr('action','/operasionalData/'+id)
      });

      var date_input=$('input[name="date"]'); //our date input has the id "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      date_input.datepicker({
          format: 'yyyy/mm/dd',
          container: container,
          todayHighlight: true,
          autoclose: true,
      });
    })

    $(".resetbtn").click(function(e) {
          var formid = $(this.form).attr('id');
          document.getElementById(formid).reset();
      });
    </script>

    <script src="{{URL::asset('assets1/js/popper.js')}}"></script>
    <script src="{{URL::asset('assets1/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets1/js/main.js')}}"></script>
    <script src="{{URL::asset('backendwork/search.js')}}"></script>
    <script src="https://mottie.github.io/tablesorter/js/jquery.tablesorter.js"></script>
    <script src="https://mottie.github.io/tablesorter/addons/pager/jquery.tablesorter.pager.js"></script>
    <script src="https://mottie.github.io/tablesorter/js/jquery.tablesorter.widgets.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>

    
    <script>
    $(function() {
        $("#mainTable").tablesorter();
    });

      $("body").on("click", "#pdfexport", function () {
            html2canvas($('#mainTable')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("operational-details.pdf");
                }
            });
        });
    </script>
  </body>
</html>