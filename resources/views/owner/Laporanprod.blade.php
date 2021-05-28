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
                    <li>
                        <a href="{{url('/stokData')}}">Stok Menu</a>
                    </li>
                    <li>
                        <a href="{{url('/laporanData')}}">Laporan Transaksi</a>
                    </li>
                    <li>
                        <a href="{{url('/laporanAll')}}">Laporan Keuangan</a>
                    </li>
                    <li class="active">
                        <a href="{{url('/laporanProduksi')}}">Laporan Produksi</a>
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

        
        <div class="row mb-3">
          <div class="col-3">
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

        <h2 class="mb-4" style="text-align:center" >Laporan Produksi</h2>
        <div class="search-container">
        
        </div>

        <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped tablesorter" id="mainTable">
                    <thead>
                        <th style="cursor:pointer">ID<i class="fas fa-sort"></i></span></th>
                        <th style="cursor:pointer">Nama<i class="fas fa-sort"></i></span></th>
                        <th style="cursor:pointer">Jumlah<i class="fas fa-sort"></i></span></th>
                        <th style="cursor:pointer">Tanggal Produksi<i class="fas fa-sort"></i></span></th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($stokprod as $sp)
                        <tr>
                            <td>{{$sp->id}}</td>
                            <td>{{$sp->nama}}</td>
                            <td>{{$sp->jumlah}}</td>
                            <td>{{$sp->tgl_produksi}}</td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editStock" 
                            data-id="{{$sp->id}}" data-idmenu="{{$sp->idm}}" data-name="{{$sp->nama}}" data-qty="{{$sp->jumlah}}" data-date="{{$sp->tgl_produksi}}">
                            edit</button>
                            </td>
                                <!-- edit Modal -->
                                <div class="modal fade" id="editStock" tabindex="-1" role="dialog" aria-labelledby="editStockLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editStockLabel">Edit Data Stock</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                    <form method="POST" action="" id="editForm">
                                    @csrf 
                                        <div class="form-group">
                                        <label for="qty">Nama Menu</label>
                                        <input type="text" class="form-control" id="namerec" name="name" disabled>
                                        <input name="menu_id" type="hidden" id="idmedit">
                                        </div>
                                        <div class="form-group">
                                        <label for="qty">Quantity</label>
                                        <input type="text" class="form-control" id="qtyrec" name="qty" required>
                                        </div>
                                        <div class="form-group">
                                        <label class="control-label" for="date">Production Date</label>
                                        <input class="form-control" id="daterec" name="date" placeholder="YYYY/MM/DD" type="text" required/>
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
                <div class="mx-5">{{ $stokprod->links('vendor.pagination.bootstrap-4') }}</div>
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