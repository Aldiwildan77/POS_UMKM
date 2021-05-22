var shoppingCart = (function() {
    cart = []; //private

    function Item(name, price, count, photo, id) {
        this.name = name;
        this.price = price;
        this.count = count;
        this.photo = photo;
        this.id = id;
    }

    // Save cart
    function saveCart() {
        sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
    }

    // Load cart
    function loadCart() {
        cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
    }

    if (sessionStorage.getItem("shoppingCart") != null) {
        loadCart();
    }

    var obj = {}; //public

    // Add to cart
    obj.addItemToCart = function(name, price, count, photo,id) {
        for (var item in cart) {
            if (cart[item].id == id) {
                cart[item].count++;
                saveCart();
                return;
            }
        }
        var item = new Item(name, price, count, photo, id);
        cart.push(item);
        saveCart();
    }
    // Set count from item
    obj.setCountForItem = function(id, count) {
        for (var i in cart) {
            if (cart[i].id == id) {
                cart[i].count = count;
                break;
            }
        }
    };
    // Remove item from cart
    obj.removeItemFromCart = function(id) {
        for (var item in cart) {
            if (cart[item].id == id) {
                cart[item].count--;
                if (cart[item].count === 0) {
                    cart.splice(item, 1);
                }
                break;
            }
        }
        saveCart();
    }

    // Remove all items from cart
    obj.removeItemFromCartAll = function(id) {
        for (var item in cart) {
            if (cart[item].id == id) {
                cart.splice(item, 1);
                break;
            }
        }
        saveCart();
    }

    // Clear cart
    obj.clearCart = function() {
        cart = [];
        saveCart();
    }

    // Count cart 
    obj.totalCount = function() {
        var totalCount = 0;
        for (var item in cart) {
            totalCount += cart[item].count;
        }
        return totalCount;
    }

    // Total cart
    obj.totalCart = function() {
        var totalCart = 0;
        for (var item in cart) {
            totalCart += cart[item].price * cart[item].count;
        }
        //return Number(totalCart.toFixed(2));
        return totalCart;
    }

    // List cart
    obj.listCart = function() {
        var cartCopy = [];
        for (i in cart) {
            item = cart[i];
            itemCopy = {};
            for (p in item) {
                itemCopy[p] = item[p];

            }
            //itemCopy.total = Number(item.price * item.count).toFixed(2);
            itemCopy.total = item.price * item.count;
            cartCopy.push(itemCopy)
        }
        return cartCopy;
    }

    // cart : Array
    // Item : Object/Class
    // addItemToCart : Function
    // removeItemFromCart : Function
    // removeItemFromCartAll : Function
    // clearCart : Function
    // countCart : Function
    // totalCart : Function
    // listCart : Function
    // saveCart : Function
    // loadCart : Function
    return obj;
})();


// *****************************************
// Triggers / Events
// ***************************************** 
// Add item
$('.add-to-cart').click(function(event) {
    event.preventDefault();
    var name = $(this).data('name');
    var photo = $(this).data('photo');
    var price = Number($(this).data('price'));
    var id = Number($(this).data('id'));
    shoppingCart.addItemToCart(name, price, 1, photo,id);
    displayCart();
});

// Clear items
$('.clear-cart').click(function() {
    shoppingCart.clearCart();
    displayCart();
});


function displayCart() {
    var cartArray = shoppingCart.listCart();
    var output = "";
    for (var i in cartArray) {
        output += "<tr>" +
        "<td><img class='img-cart' src=' "+ cartArray[i].photo +"' alt='img'></td>" +
            "<td><div class='text-cart'>"+ cartArray[i].name + "</div></td>" +
            "<td><div class='input-group'>"
            //+"<button style='width: 10px;' class='minus-item input-group-addon btn btn-primary' data-id=" + cartArray[i].id + ">-</button>" 
            +"<input type='number' style='width: 60px;' class='item-count form-control' data-id='" + cartArray[i].id + "' value='" + cartArray[i].count + "'>" 
            //+"<button style='width: 10px;' class='plus-item btn btn-primary input-group-addon' data-id=" + cartArray[i].id + ">+</button></div></td>" 
           +"<td><button style='width: 12px;' class='delete-item btn btn-danger' data-id=" + cartArray[i].id + ">X</button></td>" 
           //+" = " 
           +"<td><div class='price-cart'>Rp." + cartArray[i].total + "</div></td>" +
            "</tr>";
    }
    $('.show-cart').html(output);
    $('.total-cart').html(shoppingCart.totalCart());
    $('.total-count').html(shoppingCart.totalCount());
}

// Delete item button

$('.show-cart').on("click", ".delete-item", function(event) {
    var id = $(this).data('id');
    shoppingCart.removeItemFromCartAll(id);
    displayCart();
})


// -1
$('.show-cart').on("click", ".minus-item", function(event) {
    var id = $(this).data('id');
    shoppingCart.removeItemFromCart(id);
    displayCart();
})
// +1
$('.show-cart').on("click", ".plus-item", function(event) {
    var id = $(this).data('id');
    shoppingCart.addItemToCart(id);
    displayCart();
})

// Item count input
$('.show-cart').on("change", ".item-count", function(event) {
    var id = $(this).data('id');
    var count = Number($(this).val());
    shoppingCart.setCountForItem(id, count);
    displayCart();
});

displayCart();

// // ordering modal
$('#checkoutModal').on('show.bs.modal', function (event) {
    //var button = $(event.relatedTarget) // Button that triggered the modal
    //var name = button.data('name') 
    var cartArray = shoppingCart.listCart();
    for (var i = 0; i < cartArray.length; i++) {
        $('#menudetail').append(`<div class="row">
                                <div class="col-4">
                                    <label for="menurec">Menu</label>
                                    <input type="text" class="form-control" value="`+ cartArray[i].name+`" disabled>
                                </div>
                                <div class="col-4">
                                    <label for="qty">Qty</label>
                                    <input type="text" class="form-control" value="`+ cartArray[i].count +`" disabled>
                                </div>
                                <div class="col-4">
                                    <label for="qty">Sub total</label>
                                    <input type="text" class="form-control" value="`+ cartArray[i].total +`" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-4">
                                    <input type="hidden" class="form-control" value="`+ cartArray[i].name+`" name="menuname`+i+`">
                                </div>
                                <div class="col-4">
                                    <input type="hidden" class="form-control" value="`+ cartArray[i].count +`" name="menuqty`+i+`">
                                </div>
                                <div class="col-4">
                                    <input type="hidden" class="form-control" value="`+ cartArray[i].total +`" name="menutotal`+i+`">
                                    <input type="hidden" class="form-control" value="`+ cartArray[i].id +`" name="idmenu`+i+`">
                                </div>
                            </div>
                            `)
    }
    $('#payrec').val(shoppingCart.totalCart());
    $('#paytotal').val(shoppingCart.totalCart());
    $('#item').val(cartArray.length);
    });

    $('#checkoutModal').on('hide.bs.modal', function (event) {
        var e = document.getElementById("menudetail");
        var child = e.lastElementChild; 
        while (child) {
            e.removeChild(child);
            child = e.lastElementChild;
        }
    });

