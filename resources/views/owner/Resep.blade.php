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
            <li>
              <a href="{{url('/bahanData')}}">Data Bahan Baku</a>
	          </li>
	          <li class="active">
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

        <h2 class="mb-4" style="text-align:center" >Data Menu & Resep</h2>

        <!-- search bar -->
        <div class="row">
          <div class="col-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addRecipe">
              Add Data
            </button>
          </div>
          <div class="col-4">
          </div>
          <div class="col-4">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addRecipe" tabindex="-1" role="dialog" aria-labelledby="addRecipeLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addRecipeLabel">Add New Recipe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

              <form method="POST" action="/resepData">
              @csrf 
                <div class="form-group">
                  <label for="menu">Select Menu</label>
                  <select class="form-control dropdown-toggle" id="menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="menu_id">
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                      @foreach($menu as $m)
                      <option class="dropdown-item" value="{{$m->id}}">{{$m->nama}}</option>
                      @endforeach
                    </div>
                  </select>
                </div>
                <div class="form-group">
                  <label for="portion">Porsi</label>
                  <input type="text" class="form-control" name="porsi" required>
                  <input type="hidden" class="form-control" name="matkind" id="matkind">
                </div>
                <div class="form-group" id="formBahan">
                  <div class="row">
                    <div class="col-6">
                      <label for="ingredient">Select Material</label>
                      <select class="form-control dropdown-toggle" id="ingredient" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="ingredient_id1">
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                          @foreach($bahan as $b)
                          <option class="dropdown-item" value="{{$b->id}}">{{$b->nama}}</option>
                          @endforeach
                        </div>
                      </select>
                    </div>
                    <div class="col-6">
                      <label for="qty">Jumlah</label>
                      <input type="text" class="form-control" id="qty" name="qty1" required>
                    </div>
                  </div>
                </div>
                <div class="form-group align-self-end">
                  <button type="button" id="btnmat" class="btn btn-primary">Add Material</button>
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
                  <th>Menu</th>
                  <th>Menu</th>
                  <th>Porsi</th>
                  <th>Nama Bahan</th>
                  <th>Jumlah</th>
                  <th>HPP</th>
                  <th>Action</th>
              </thead>
              <tbody>
                  @foreach($resep as $r)
                  <tr>
                      <td>{{$r->id}}</td>
                      <td>{{$r->menu}}</td>
                      <td>{{$r->porsi}}</td>
                      <td>{{$r->bahan}}</td>
                      <td>{{$r->jumlah}}</td>
                      <td>{{$r->hpp}}</td>
                      <td><a class="btn btn-primary" data-toggle="modal" data-target="#editRecipe" data-idmenu="{{$r->id}}" data-idresep="{{$r->idresep}}"
                      data-name="{{$r->menu}}" data-idmat="{{$r->idbahan}}" data-mat="{{$r->bahan}}" data-qty="{{$r->jumlah}}" data-porsi="{{$r->porsi}}">Edit</a>
                      
                          <!-- Modal -->
                          <div class="modal fade" id="editRecipe" tabindex="-1" role="dialog" aria-labelledby="editRecipeLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="editRecipeLabel">Edit Data Recipe</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">

                                <form method="POST" id="formedit">
                                @csrf
                                  <div class="form-group">
                                    <label for="name">Nama Menu</label>
                                    <input type="text" class="form-control" name="menu" id="namerec" disabled>
                                    <input type="hidden" class="form-control" name="menuid" id="menuid" >
                                  </div>
                                  <div class="form-group">
                                    <label for="portion">Porsi</label>
                                    <input type="text" class="form-control" id="porsirec" name="porsi" required>
                                    <input type="hidden" class="form-control" name="matkind" id="matkind2">
                                  </div>
                                  <div class="form-group" id="formBahan2">

                                  </div>
                                  <div class="form-group align-self-end">
                                    <button type="button" id="btnmat2" class="btn btn-primary">Add Material</button>
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
          <div class="mx-5">{{ $resep->links('vendor.pagination.bootstrap-4') }}</div>
        </div>
      </div>
		</div>

    <script>
      $(document).ready(function(){
        var z = 0;
        $('#editRecipe').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var name = button.data('name')
        var idmenu = button.data('idmenu')
        var mat = button.data('mat')
        var idmat = button.data('idmat')
        var idrecipe = button.data('idresep')
        var qty = button.data('qty')
        var porsi = button.data('porsi')// Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        $('#namerec').val(name)
        $('#porsirec').val(porsi)
        $('#menuid').val(idmenu)
        $('#formedit').attr('action','/resepData/'+idmenu);     
        var matArr = mat.split(',')
        var idmatstr = idmat.toString()
        var idmatArr = idmatstr.split(',')
        var idrecipestr = idrecipe.toString()
        var idrecipeArr = idrecipestr.split(',')
        var x = qty.toString()
        z = matArr.length;
        var qtyArr = x.split(',')
        for (var i = 0; i < matArr.length; i++) {
          $('#formBahan2').append(`<div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label for="ingredient">Select Material</label>
                        <select class="form-control dropdown-toggle" id="ingredient" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="ingredient_id`+i+`">
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                            <option class="dropdown-item" name="matid"`+i+` value="`+idmatArr[i]+`">`+ matArr[i]+`</option>
                          </div>
                        </select>
                      </div>
                      <div class="col-6">
                        <label for="qty">Jumlah</label>
                        <input type="text" class="form-control" id="qty" name="qty`+i+`" value="`+ qtyArr[i] +`" required>
                        <input type="hidden" class="form-control" name="recipeid`+i+`" value="`+ idrecipeArr[i] +`">
                      </div>
                    </div>
                  </div>`)
          }
          $('#matkind2').val(matArr.length)     
        }); 

        var x = 2;
        $("#btnmat").click(function(){
          $("#formBahan").append(`<div class="form-group">
                  <div class="row">
                    <div class="col-6">
                      <label for="ingredient">Select Material</label>
                      <select class="form-control dropdown-toggle" id="ingredient" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="ingredient_id`+x+`">
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                          @foreach($bahan as $b)
                          <option class="dropdown-item" value="{{$b->id}}">{{$b->nama}}</option>
                          @endforeach
                        </div>
                      </select>
                    </div>
                    <div class="col-6">
                      <label for="qty">Jumlah</label>
                      <input type="text" class="form-control" id="qty" name="qty`+x+`" required>
                    </div>
                  </div>
                </div>`);
        $('#matkind').val(x);            
          x++;      
        });

        $("#btnmat2").click(function(){
          $("#formBahan2").append(`<div class="form-group">
                  <div class="row">
                    <div class="col-6">
                      <label for="ingredient">Select Material</label>
                      <select class="form-control dropdown-toggle" id="ingredient" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="ingredient_id`+z+`">
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                          @foreach($bahan as $b)
                          <option class="dropdown-item" value="{{$b->id}}">{{$b->nama}}</option>
                          @endforeach
                        </div>
                      </select>
                    </div>
                    <div class="col-6">
                      <label for="qty">Jumlah</label>
                      <input type="text" class="form-control" id="qty" name="qty`+z+`" required>
                      <input type="hidden" class="form-control" name="recipeid`+z+`" value="0">
                    </div>
                  </div>
                </div>`);
                z++;   
          $('#matkind2').val(z);
        });

        $('#editRecipe').on('hide.bs.modal', function (event) {
        var e = document.getElementById("formBahan2");
        var child = e.lastElementChild; 
        while (child) {
            e.removeChild(child);
            child = e.lastElementChild;
        }
        y=0;
        });

        $('#addRecipe').on('hide.bs.modal', function (event) {
        x=0;
        });

      })
    </script>
    <script src="{{URL::asset('assets1/js/popper.js')}}"></script>
    <script src="{{URL::asset('assets1/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets1/js/main.js')}}"></script>
  </body>
</html>