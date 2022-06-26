function showCart(cart) {
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
}

function clearCart() {
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function (res) {
            if (!res) alert('Ошибка!');
            showCart(res);
        },
        error: function () {
            alert('Error!');
        }
    });
}

$(document).on('click', '#getCart', function(event) {
    event.preventDefault();
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function (res) {
            if (!res) alert('Something went wrong!');
            showCart(res);
        },
        error: function () {
            alert('Something went wrong!');
        }
    });
    return false;
});

//$('#cart .modal-body').on('click', '.del-item', function () {
$('#cart .modal-body').on('click', '.del-item', function () {

    var id = $(this).data('id');
    $.ajax({
        url: '/cart/del-item',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            if (!res) alert('Ошибка!');
            showCart(res);
        },
        error: function () {
            alert('Error!');
        }
    });
});

$('.add-to-cart').on('click', function (e) {
    e.preventDefault();
    var id = $(this).data('id'),
        qty = $('#qty').val();

    $.ajax({
        url: '/cart/add',
        data: {id: id, qty: qty},
        type: 'GET',
        success: function (res) {
            $('#qty').val('1');
            showCart(res);
            if (!res) alert('Ошибка!');
            // console.log(res);
        },
        error: function () {
            alert('Error!');
        }
    });
});
