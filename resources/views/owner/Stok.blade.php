<!doctype html>
<html lang="en">
  <head>
  	<title>Alsinsky Frozen</title>
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
	          <li>
              <a href="{{url('/operasionalData')}}">Data Operasional</a>
	          </li>
            <li>
              <a href="{{url('/bahanData')}}">Data Bahan Baku</a>
	          </li>
	          <li>
              <a href="{{url('/resepData')}}">Data Menu & Resep</a>
	          </li>
	          <li class="active">
              <a href="{{url('/stokData')}}">Stok Menu</a>
            </li>
            <li>
              <a href="{{url('/laporanData')}}">Laporan Transaksi</a>
            </li>
            <li>
              <a href="{{url('/laporanAll')}}">Laporan Keuangan</a>
	          </li>
            <li>
                <a href="{{url('/laporanAll')}}">Laporan Produksi</a>
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
                    <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/logout')}}">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <h2 class="mb-4" style="text-align:center" >Data Stok</h2>

        @if (session('status'))
          <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong> {{ session('status') }}
        </div>
        @endif

         <div class="row mb-3">
          <div class="col-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStock">
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

              <form method="POST" action="/stokData" id="addstok">
              @csrf 
                <div class="form-group">
                  <label for="menu">Select Menu</label>
                  <select class="form-control dropdown-toggle" id="menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                      @foreach($menu as $m)
                      <option class="dropdown-item" value="{{$m->id}}">{{$m->nama}}</option>
                      @endforeach
                    </div>
                  </select>
                  <input name="menu_id" type="hidden" id="menuselected">
                </div>
                <div class="form-group">
                  <label for="qty">Quantity</label>
                  <input type="text" class="form-control" id="qty" name="qty" required>
                </div>
                <div class="form-group">
                  <label class="control-label" for="date">Production Date</label>
                  <input class="form-control" id="date" name="date" placeholder="YYYY/MM/DD" type="text" required/>
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
                    <th style="cursor:pointer">ID<span><i class="fas fa-sort"></i></span></th>
                    <th style="cursor:pointer">Nama<span><i class="fas fa-sort"></i></span></th>
                    <th style="cursor:pointer">Jumlah<span><i class="fas fa-sort"></i></span></th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($stok as $s)
                    <tr>
                        <td>{{$s->id}}</td>
                        <td>{{$s->nama}}</td>
                        <td>{{$s->jumlah}}</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailStock" 
                        data-name="{{$s->nama}}" data-qtyd="{{$s->qtyd}}" data-dated="{{$s->dated}}" data-type="{{$s->type}}">
                        detail</button> </td>

                            <!-- detail Modal -->
                            <div class="modal fade" id="detailStock" tabindex="-1" role="dialog" aria-labelledby="detailStockLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="detailStockLabel">Detail Stock Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <label for="qty">Nama Menu</label>
                                      <input type="text" class="form-control" id="named" name="name" disabled>
                                    </div>
                                    <div class="form-group" id="detailProd">
                                      
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label" for="statusd">Status</label>
                                      <input type="text" class="form-control" id="statusd" value="available" disabled>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mx-5">{{ $stok->links('vendor.pagination.bootstrap-4') }}</div>
        </div>


      </div>
		</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://mottie.github.io/tablesorter/js/jquery.tablesorter.js"></script>
    <script src="https://mottie.github.io/tablesorter/addons/pager/jquery.tablesorter.pager.js"></script>
    <script src="https://mottie.github.io/tablesorter/js/jquery.tablesorter.widgets.js"></script>
    
    <script>
    $(function() {
        $("#mainTable").tablesorter();
    });
    </script>

    <script>
      $(document).ready(function(){
        $('#menu').on('change', function() {
          var menu = $('#menu').val()
          $('#menuselected').val(menu)
        });

        $('#editStock').on('show.bs.modal', function (event) {
          console.log('edit show')
          var button = $(event.relatedTarget) // Button that triggered the modal
          var name = button.data('name') 
          var qty = button.data('qty')
          var date = button.data('date')
          var id = button.data('id')
          var idmenu = button.data('idmenu')// Extract info from data-* attributes
          console.log(id)
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          $('#idmedit').val(idmenu)
          $('#namerec').val(name)
          $('#qtyrec').val(qty)
          $('#daterec').val(date)
          $('#editForm').attr('action','/stokData/'+id)
        });

        $('#detailStock').on('show.bs.modal', function (event) {
          console.log('detail show')
          var button = $(event.relatedTarget) // Button that triggered the modal
          var name = button.data('name') 
          var qtyd = button.data('qtyd')
          var dated = button.data('dated')
          var type = button.data('type')// Extract info from data-* attributes
          console.log(name)
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          $('#named').val(name)
          if (type > 1) {
            var q = qtyd.toString()
            var qtyArr = qtyd.split(',')
            var x = dated.toString()
            var dateArr = x.split(',')
            for (var i = 0; i < qtyArr.length; i++) {
              $('#detailProd').append(`<div class="form-group">
                                          <div class="row">
                                            <div class="col-6">
                                              <label for="qty">Quantity</label>
                                              <input type="text" class="form-control" value="`+ qtyArr[i] +`" disabled>
                                            </div>
                                            <div class="col-6">
                                              <label class="control-label" for="date">Production Date</label>
                                              <input class="form-control" value="`+ dateArr[i] +`" disabled/>
                                            </div>
                                          </div>
                                        </div>`)
            }
          }
          else{
            $('#detailProd').append(`<div class="form-group">
                                        <div class="row">
                                          <div class="col-6">
                                            <label for="qty">Quantity</label>
                                            <input type="text" class="form-control" value="`+ qtyd +`" disabled>
                                          </div>
                                          <div class="col-6">
                                            <label class="control-label" for="date">Production Date</label>
                                            <input class="form-control" value="`+ dated +`" disabled/>
                                          </div>
                                        </div>
                                      </div>`)
          }
        });

        $('#detailStock').on('hide.bs.modal', function (event) {
        var e = document.getElementById("detailProd");
        var child = e.lastElementChild; 
        while (child) {
            e.removeChild(child);
            child = e.lastElementChild;
        }
        });
        
        $(".resetbtn").click(function(e) {
          var formid = $(this.form).attr('id');
          document.getElementById(formid).reset();
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
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
    <script src="{{URL::asset('backendwork/search.js')}}"></script>
   
  </body>
</html>