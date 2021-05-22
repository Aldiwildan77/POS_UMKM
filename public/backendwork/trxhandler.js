$(document).ready(function(){
    $('#viewModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')// Extract info from data-* attributes 
    var name = button.data('name') 
    var phone = button.data('phone')
    var pm = button.data('pm')
    var menu = button.data('menu')  
    var qty = button.data('qty')
    var total = button.data('total')
    var status = button.data('status')
    if (status == 1) {
        status = 'Processed'
    }
    if (status == 2) {
        status = 'On the way'
    }
    if (status == 3) {
        status = 'Delivered'
    }
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#viewModalLabel').val('Transaction id' + id)
    $('#namerec').val(name)
    $('#phonerec').val(phone)
    $('#payrec').val(total)
    $('#statusrec').val("status")
    var menuArr = menu.split(',')
    var x = qty.toString()
    var qtyArr = x.split(',')
    for (var i = 0; i < menuArr.length; i++) {
        $('#menudetail').append(`<div class="row">
                                <div class="col-6">
                                    <label for="menurec">Menu</label>
                                    <input type="text" class="form-control" value="`+ menuArr[i]+`" disabled>
                                </div>
                                <div class="col-6">
                                    <label for="qty">Jumlah</label>
                                    <input type="text" class="form-control" value="`+ qtyArr[i] +`" disabled>
                                </div>
                            </div>`)
    }

    });

    $('#viewModal').on('hide.bs.modal', function (event) {
        var e = document.getElementById("menudetail");
        var child = e.lastElementChild; 
        while (child) {
            e.removeChild(child);
            child = e.lastElementChild;
        }
    });

    $('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id')// Extract info from data-* attributes 
    var name = button.data('name') 
    var phone = button.data('phone')
    var pm = button.data('pm')
    var menu = button.data('menu')
    var qty = button.data('qty') // TODO use detail later
    var total = button.data('total')
    var status = button.data('status')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $('#editModalLabel').val('Transaction id' + id)
    $('#namerecx').val(name)
    $('#phonerecx').val(phone)
    $('#payrecx').val(total)
    var menuArr = menu.split(',')
    var x = qty.toString()
    var qtyArr = x.split(',')
    for (var i = 0; i < menuArr.length; i++) {
        $('#menudetailx').append(`<div class="row">
                                <div class="col-6">
                                    <label for="menurec">Menu</label>
                                    <input type="text" class="form-control" value="`+ menuArr[i]+`" disabled>
                                </div>
                                <div class="col-6">
                                    <label for="qty">Jumlah</label>
                                    <input type="text" class="form-control" value="`+ qtyArr[i] +`" disabled>
                                </div>
                            </div>`)
    }
    });

    $('#editModal').on('hide.bs.modal', function (event) {
        var e = document.getElementById("menudetailx");
        var child = e.lastElementChild; 
        while (child) {
            e.removeChild(child);
            child = e.lastElementChild;
        }
    });
})
