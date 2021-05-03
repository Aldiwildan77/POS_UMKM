<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Alsinsky Frozen</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{URL::asset('assets1/css/style.css')}}">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    </head>
    
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <a class="navbar-brand" href="#">Alsinsky Frozen</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-md-center" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/index')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/transaksi')}}">Transaction</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Cashier
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Logout</a>
                </div>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="wrapper my-4 mx-2">
        <div class="row">
            <div class="col-9">
                <div class="row my-4">
                    <!-- loop menu start here -->
                    <div class="col-4">
                        <a href="" data-name="porkchooooooooop" data-price="10000" data-photo="https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MTN8fHxlbnwwfHx8&auto=format&fit=crop&w=700&q=60" class="add-to-cart">
                            <div class="card">
                                <div class="media">
                                    <div class="media-body p-1">
                                        <h5 class="card-title">Pork Chop Dinner</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">50 pcs</h6>
                                        <h6 class="card-subtitle mb-2 font-weight-bold text-price" >Rp 25.000</h6>
                                    </div>
                                    <img class="img-menu align-self-end ml-3" src="https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MTN8fHxlbnwwfHx8&auto=format&fit=crop&w=700&q=60" alt="Generic placeholder image" >
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- loop menu end here -->
                    <div class="col-4">
                        <a href="" data-name="Pastakind" data-price="1300" data-photo="https://images.unsplash.com/photo-1473093295043-cdd812d0e601?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MTF8fHxlbnwwfHx8&auto=format&fit=crop&w=700&q=60" class="add-to-cart">
                            <div class="card">
                                <div class="media">
                                    <div class="media-body p-1">
                                        <h5 class="card-title ">PastaKind</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">50 pcs</h6>
                                        <h6 class="card-subtitle mb-2 font-weight-bold text-price">Rp 25.000</h6>
                                    </div>
                                    <img class="img-menu align-self-end ml-3" src="https://images.unsplash.com/photo-1473093295043-cdd812d0e601?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MTF8fHxlbnwwfHx8&auto=format&fit=crop&w=700&q=60" alt="Generic placeholder image" >
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="" data-name="tend" data-price="2050" data-photo="https://images.unsplash.com/photo-1432139555190-58524dae6a55?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mzh8fHxlbnwwfHx8&auto=format&fit=crop&w=700&q=60" class="add-to-cart">
                            <div class="card">
                                <div class="media">
                                    <div class="media-body p-1">
                                        <h5 class="card-title">Tenderloin</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">50 pcs</h6>
                                        <h6 class="card-subtitle mb-2 font-weight-bold text-price" >Rp 25.000</h6>
                                    </div>
                                    <img class="img-menu align-self-end ml-3" src="https://images.unsplash.com/photo-1432139555190-58524dae6a55?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mzh8fHxlbnwwfHx8&auto=format&fit=crop&w=700&q=60" alt="Generic placeholder image" >
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <!-- loop menu start here -->
                    @foreach($menu as $m)
                    <div class="col-4 my-3">
                        <a href="" data-name="{{$m->nama}}" data-price="{{$m->harga}}" data-photo="{{$m->foto}}" class="add-to-cart">
                            <div class="card">
                                <div class="media">
                                    <div class="media-body p-1">
                                        <h5 class="card-title">{{$m->nama}}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{$m->qty}} pcs</h6>
                                        <h6 class="card-subtitle mb-2 font-weight-bold text-price" >Rp {{$m->harga}}</h6>
                                    </div>
                                    <img class="img-menu align-self-end ml-3" src="{{$m->foto}}" alt="image" >
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    <!-- loop menu end here -->
                    <!-- <div class="col-4">
                        <div class="card">
                            <div class="media">
                                <div class="media-body p-1">
                                    <h5 class="card-title">Pork Chop Dinner</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">50 pcs</h6>
                                    <h6 class="card-subtitle mb-2 font-weight-bold text-price" >Rp 25.000</h6>
                                </div>
                                <img class="img-menu align-self-end ml-3" src="https://images.unsplash.com/photo-1473093295043-cdd812d0e601?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MTF8fHxlbnwwfHx8&auto=format&fit=crop&w=700&q=60" alt="Generic placeholder image" >
                            </div>
                        </div> 
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="media">
                                <div class="media-body p-1">
                                    <h5 class="text-cart">Pork Chop Dinner</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">50 pcs</h6>
                                    <h6 class="card-subtitle mb-2 font-weight-bold text-price" >Rp 25.000</h6>
                                </div>
                                <img class="img-menu align-self-end ml-3" src="https://images.unsplash.com/photo-1432139555190-58524dae6a55?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mzh8fHxlbnwwfHx8&auto=format&fit=crop&w=700&q=60" alt="Generic placeholder image" >
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>

            <div class="col-3">
                <div class="row my-2 mx-0">
                    <h5 class="ml-0"> Current Order</h5>
                    <button class="clear-cart btn btn-danger ml-5">clear</button>
                </div>
                <!-- cart load here-->
                <table class="show-cart mx-0">
                    <div></div>
                </table>
                <br><br><br>
                <div class="row shadow p-1 mb-5 bg-white rounded">
                    <div class="col-6">
                        <p>Item Dibeli</p>
                        <p>Grand Total</p>
                    </div>
                    <div class="col-6">
                        <p><span class="total-count"></p>
                        <p>Rp <span class="total-cart">.000</p> 
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#checkoutModal">
                        Checkout Transaction
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="checkoutModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="">
                              @csrf
                                <div class="form-group">
                                  <label for="name">Nama Pemesan</label>
                                  <input type="text" class="form-control" id="name" name="name">
                                  <!-- <input type="hidden" class="form-control" id="idBahan" name="ingrId"> -->
                                </div>
                                <div class="form-group">
                                  <label for="addr">Alamat Pemesan </label>
                                  <input type="text" class="form-control" name="addr">
                                </div>
                                <div class="form-group">
                                    <label for="phone">No hp</label>
                                    <input type="text" class="form-control" id="phone" name="phone">
                                </div>
                                <div class="form-group" id="menudetail">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="payrec">Total</label>
                                    <input type="text" class="form-control total-cart" id="payrec" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="paymethod">Select Payment Method</label>
                                    <select class="form-control dropdown-toggle" id="paymethod" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="pay_id">
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                        <option class="dropdown-item" value="ovo">ovo</option>
                                        <option class="dropdown-item" value="transfer">transfer bank</option>
                                        <option class="dropdown-item" value="cash">cash</option>
                                        </div>
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="statusrrec">Status</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Proccessed
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            On the way
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Delivered
                                        </label>
                                    </div>
                                </div>
                            </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Reset</button>
                                <input type="submit" class="btn btn-primary" value="Save Changes">
                              </div>
                              </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
     
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script src="{{URL::asset('backendwork/cart.js')}}"></script>
    </body>
</html>