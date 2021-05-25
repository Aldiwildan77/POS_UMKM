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

        <h2 class="mb-4" style="text-align:center" >Laporan Belanja</h2>

        @if (session('status'))
          <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong> {{ session('status') }}
        </div>
        @endif

        <!-- search filter sort bar -->
        <div class="row mb-3">
          <div class="col-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStock">
              Add Data
            </button>
          </div>
          <div class="col-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editStockrt">
              Add Stock
            </button>
          </div>
          <div class="col-2">
            <div class="row">
              <button class="btn btn-primary" id="pdfexport">To PDF</button>
              <!-- <div class="">
                <input class="form-control" id="date" name="date" placeholder="Filter by Date" type="text"/>
              </div> -->
            </div> 
          </div>
          <div class="col-6">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search" id="searchInput" aria-label="Search" aria-describedby="button-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>


        <!-- new ingredients Modal -->
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
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
              </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Save Data">
              </div>

              </form>
            </div>
          </div>
        </div>

        <!-- modal add stock -->
        <div class="modal fade" id="editStockrt" tabindex="-1" role="dialog" aria-labelledby="editStockrtLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editStockrtLabel">Add Stock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

              <form method="POST" action="/bahanNew" id="addbahan">
              @csrf
                <div class="form-group">
                  <label for="mat">Select Ingredient</label>
                  <select class="form-control dropdown-toggle" id="mat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="ingrId">
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                      @foreach($bahan as $b)
                      <option class="dropdown-item" value="{{$b->id}}">{{$b->nama}}</option>
                      @endforeach
                    </div>
                  </select>
                </div>
                <div class="form-group">
                  <label for="price">Nominal </label>
                  <input type="text" class="form-control" name="price" required>
                </div>
                <div class="form-group">
                  <label for="qty">Jumlah </label>
                  <div class="row">
                    <div class="col-6">
                      <input type="text" class="form-control" id="qty" name="qty" required>
                    </div>
                    <div class="col-6">
                      <select class="form-control dropdown-toggle" id="unit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="unit">
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                          <option class="dropdown-item" value="1">gram</option>
                          <option class="dropdown-item" value="2">mililiter</option>
                        </div>
                    </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label" for="date">Date</label>
                  <input class="form-control"  name="date" placeholder="YYYY/MM/DD" type="text" required/>
                </div>
                <div class="form-group">
                  <label for="photo">Fraktur</label>
                  <input type="file" class="form-control-file" id="photo">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary resetbtn">Reset</button>
                <input type="submit" class="btn btn-primary" value="Save Changes">
              </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Laporan belanja -->
        <div class="card-body table-full-width table-responsive">
            <table class="table table-hover table-striped tablesorter" id="mainTable">
                <thead>
                    <th>No</th>
                    <th style="cursor:pointer">Bahan<span><i class="fas fa-sort"></i></span></th>
                    <th style="cursor:pointer">Nominal<span><i class="fas fa-sort"></i></span></th>
                    <th style="cursor:pointer">Jumlah<span><i class="fas fa-sort"></i></span></th>
                    <th>Satuan</th>
                    <th style="cursor:pointer">Tanggal Pembelian<span><i class="fas fa-sort"></i></span></th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($fullstock as $fs)
                    <tr>
                        <td>{{$fs->id}}</td>
                        <td>{{$fs->nama}}</td>
                        <td>Rp. {{$fs->jumlah}}</td>
                        <td>{{$fs->qty}}</td>
                        @if ($fs->qty_satuan == 1)
                        <td>gram</td>
                        @elseif ($fs->qty_satuan == 2)
                        <td>mililiter</td>
                        @endif
                        <td>{{$fs->tgl_beli}}</td> 
                        <td><a class="btn btn-primary" role="button" data-toggle="modal" data-target="#editStock" data-qty="{{$fs->qty_satuan}}"
                        data-id="{{$fs->id}}" data-idx="{{$fs->idBahan}}" data-name="{{$fs->nama}}" data-nominal="{{$fs->jumlah}}" data-date="{{$fs->tgl_beli}}">Edit Data</a>
                        </td> 

                         <!-- Modal Edit-->
                        <div class="modal fade" id="editStock" tabindex="-1" role="dialog" aria-labelledby="editStockLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="editStockLabel">Edit Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                              <form method="POST" action="/bahanEdit">
                                @csrf
                                <div class="form-group">
                                  <label for="namerec">Nama</label>
                                  <input type="text" class="form-control" id="namerec" disabled>
                                  <input type="hidden" class="form-control" id="idDetail" name="idDetail">
                                  <input type="hidden" class="form-control" id="idIngr" name="idbahan">
                                </div>
                                <div class="form-group">
                                  <label for="nominalrec">Nominal </label>
                                  <input type="text" class="form-control" id="nominalrec" name="nominal" required>
                                </div>
                                <div class="form-group">
                                  <label for="qtyrec">Jumlah </label>
                                  <div class="row">
                                    <div class="col-6">
                                      <input type="text" class="form-control" id="qtyrec" name="qty" required>
                                    </div>
                                    <div class="col-6">
                                      <select class="form-control dropdown-toggle" id="unit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="unit">
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                          <option class="dropdown-item" value="1">gram</option>
                                          <option class="dropdown-item" value="2">mililiter</option>
                                        </div>
                                    </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label" for="date">Date</label>
                                  <input class="form-control" id="daterec" name="date" placeholder="YYYY/MM/DD" type="text" required/>
                                </div>
                                <div class="form-group">
                                  <label for="photo">Fraktur</label>
                                  <input type="file" class="form-control-file" id="photo">
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
                      
                                          
                    </tr>
                    @endforeach
                </tbody>
              
            </table>

            <div class="mx-5">{{ $fullstock->links('vendor.pagination.bootstrap-4') }}</div> <!-- idk how to cutom size -->
        </div>
      </div>
		</div>

    <script src="{{URL::asset('assets1/js/popper.js')}} "></script>
    <script src="{{URL::asset('assets1/js/bootstrap.min.js')}} "></script>
    <script src="{{URL::asset('assets1/js/main.js')}} "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
    <script src="{{URL::asset('backendwork/search.js')}}"></script>
    <script src="https://mottie.github.io/tablesorter/js/jquery.tablesorter.js"></script>
    <script src="https://mottie.github.io/tablesorter/addons/pager/jquery.tablesorter.pager.js"></script>
    <script src="https://mottie.github.io/tablesorter/js/jquery.tablesorter.widgets.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    
    <script>
      $(document).ready(function(){
        //$("#mainTable").tablesorter();
        $('#editStock').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var name = button.data('name') 
        var nominal = button.data('nominal')
        var qty = button.data('qty')
        var date = button.data('date')
        var id = button.data('id')
        var idIngr = button.data('idx')// Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        $('#namerec').val(name)
        $('#nominalrec').val(nominal)
        $('#qtyrec').val(qty)
        $('#daterec').val(date)
        $('#idDetail').val(id)
        $('#idIngr').val(idIngr)

        });

        var date_input=$('input[name="date"]'); //our date input has the id "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        });

        $("#mainTable").tablesorter();
    });

    $(".resetbtn").click(function(e) {
      var formid = $(this.form).attr('id');
      document.getElementById(formid).reset();
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
                    pdfMake.createPdf(docDefinition).download("shop-details.pdf");
                }
            });
        });
    </script>
    
  </body>
</html>