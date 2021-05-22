<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alsinsky Frozen</title>
    <link rel="stylesheet" href="{{URL::asset('assets1/css/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <a class="navbar-brand" href="#">Alsinsky Frozen</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-md-center" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('/index')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
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

    <!-- search bar -->
    <div class="input-group mb-3 mx-4">
        <input type="text" class="form-control" id="searchInput" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
        </div>
    </div>

    <button class="btn btn-primary" id="pdfexport">To PDF</button>

    <div class="row">
        <div class="card-body table-full-width table-responsive">
            <table class="table table-hover table-striped tablesorter" id="mainTable">
                <thead>
                    <th style="cursor:pointer">Id <span><i class="fas fa-sort"></i></span></th>
                    <th style="cursor:pointer">Nama <span><i class="fas fa-sort"></i></span></th>
                    <th style="cursor:pointer">No HP <span><i class="fas fa-sort"></i></span></th>
                    <th style="cursor:pointer">Pembayaran <span><i class="fas fa-sort"></i></span></th>
                    <th style="cursor:pointer">Menu <span><i class="fas fa-sort"></i></span></th>
                    <th style="cursor:pointer">QTY <span><i class="fas fa-sort"></i></span></th>
                    <th style="cursor:pointer">Total <span><i class="fas fa-sort"></i></span></th>
                    <th style="cursor:pointer">Status <span><i class="fas fa-sort"></i></span></th>
                </thead>
                <tbody>
                    @foreach($transaksi as $t)
                    <tr>
                        <td>{{$t->id}}</td>
                        <td>{{$t->nama}}</td>
                        <td>{{$t->no_hp}}</td>
                        <td>{{$t->metode}}</td>
                        <td>{{$t->menu}}</td>
                        <td>{{$t->qty}}</td>
                        <td>{{$t->nominal}}</td>
                        <td>
                            <div style="background-color: green;width: max-content;"><span class="mx-1">Delivered</span></div>
                        </td>
                        <td class="dropdown show">
                            <a class="fas fa-ellipsis-v" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" data-toggle="modal" data-target="#viewModal" href="#viewModal"
                                    data-id="{{$t->id}}" data-name="{{$t->nama}}" data-phone="{{$t->no_hp}}" data-pm="{{$t->metode}}"
                                    data-menu="{{$t->menu}}" data-qty="{{$t->qeach}}" data-total="{{$t->nominal}}">
                                    View Detail</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#editModal" href="#editModal"
                                    data-id="{{$t->id}}" data-name="{{$t->nama}}" data-phone="{{$t->no_hp}}" data-pm="{{$t->metode}}"
                                    data-menu="{{$t->menu}}" data-qty="{{$t->qeach}}" data-total="{{$t->nominal}}" >
                                    Edit Status</a>
                            </div>
                        </td>

                        <!-- Modal view-->
                        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewModalLabel">Transaction id {{$t->id}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="namerec">Nama Pemesan</label>
                                                <input type="text" class="form-control" id="namerec" value="{{$t->nama}}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="phonerec">No hp</label>
                                                <input type="text" class="form-control" id="phonerec" value="{{$t->no_hp}}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="addrrec">Alamat</label>
                                                <input type="text" class="form-control" id="addrrec" value="Malang" disabled>
                                            </div>
                                            <div class="form-group" id="menudetail">
                                            </div>
                                            <div class="form-group">
                                                <label for="payrec">Total</label>
                                                <input type="text" class="form-control" id="payrec" value="{{$t->nominal}}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="statusrrec">Status</label>
                                                <input type="text" class="form-control" id="statusrrec" value="Delivered" disabled>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal edit-->
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Transaction id xxx</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="namerecx">Nama Pemesan</label>
                                                <input type="text" class="form-control" id="namerecx" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="phonerecx">No hp</label>
                                                <input type="text" class="form-control" id="phonerecx" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="addrrecx">Alamat</label>
                                                <input type="text" class="form-control" id="addrrecx" disabled>
                                            </div>
                                            <div class="form-group" id="menudetailx">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="payrec">Total</label>
                                                <input type="text" class="form-control" id="payrec" disabled>
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
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mx-5">{{ $transaksi->links('vendor.pagination.bootstrap-4') }}</div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{URL::asset('backendwork/trxhandler.js')}}"></script>
    <script src="{{URL::asset('backendwork/search.js')}}"></script>
    <script src="https://mottie.github.io/tablesorter/js/jquery.tablesorter.js"></script>
    <script src="https://mottie.github.io/tablesorter/addons/pager/jquery.tablesorter.pager.js"></script>
    <script src="https://mottie.github.io/tablesorter/js/jquery.tablesorter.widgets.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    
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
                    pdfMake.createPdf(docDefinition).download("transaction-details.pdf");
                }
            });
        });
    </script>

</body>

</html>