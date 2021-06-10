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
                <a class="dropdown-item" href="{{url('cashier')}}">Profile</a> 
                <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong> {{ session('status') }}
        </div>
    @endif

    <div class="wrapper my-4 mx-2">
        <div class="row">
            <div class="col-9">
                <div class="row my-4">
                    <!-- loop menu start here -->
                    @foreach($menu as $m)
                    <div class="col-4 my-3">
                        <a href="" data-name="{{$m->nama}}" data-price="{{$m->harga}}" data-photo="{{$m->foto}}" data-id="{{$m->id}}" data-max="{{$m->qty}}" class="add-to-cart">
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
                                <h5 class="modal-title" id="checkoutModalLabel">Checkout Transaction</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="/index" id="addtrx">
                              @csrf
                                <div class="form-group">
                                  <label for="name">Nama Pemesan</label>
                                  <input type="text" class="form-control" id="name" name="name" required>
                                  <!-- <input type="hidden" class="form-control" id="idBahan" name="ingrId"> -->
                                </div>
                                <div class="form-group">
                                  <label for="addr">Alamat Pemesan </label>
                                  <input type="text" class="form-control" name="addr" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">No hp</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                </div>
                                <div class="form-group" id="menudetail">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="payrec">Total</label>
                                    <input type="text" class="form-control" id="payrec" disabled>
                                    <input type="hidden" class="form-control" id="paytotal" name="total">
                                    <input type="hidden" class="form-control" id="item" name="itemtotal">
                                </div>
                                <div class="form-group">
                                    <label for="paymethod">Select Payment Method</label>
                                    <select class="form-control dropdown-toggle" id="paymethod" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="pm">
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                        <option class="dropdown-item" value="ovo">ovo</option>
                                        <option class="dropdown-item" value="transfer">transfer</option>
                                        <option class="dropdown-item" value="cash">cash</option>
                                        </div>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Select Delivery Status</label>
                                    <select class="form-control dropdown-toggle" id="status" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="status">
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                        <option class="dropdown-item" value="1">Processed</option>
                                        <option class="dropdown-item" value="2">On the way</option>
                                        <option class="dropdown-item" value="3">Arrived</option>
                                        </div>
                                    </select>
                                </div>
                            </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary resetbtn">Reset</button>
                                <input type="submit" class="btn btn-primary clear-cart" value="Save Changes">
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

    <script>
    $(".resetbtn").click(function(e) {
      var formid = $(this.form).attr('id');
      document.getElementById(formid).reset();
    });
    </script>
    </body>
</html>