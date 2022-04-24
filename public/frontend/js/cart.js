$(document).ready(function () {
    addToCart();
    loadCart();
    plus();
    minus();
    buyNow();

    $(document).on('click', '.increment-btn', function(e) {
        e.preventDefault();
        var incre_value = $(this).parents('.quantity').find('.qty-input').val();
        var value = parseInt(incre_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value<100){
            value++;
            $(this).parents('.quantity').find('.qty-input').val(value);
        }
        var product_id = $(this).closest(".cartpage").find('.product_id').val();
        console.log(product_id);
        var data = {
            '_token': $('input[name=_token]').val(),
            'quantity':value,
            'product_id':product_id,
        };

        $.ajax({
            url: '/update-cart',
            type: 'POST',
            data: data,
            success: function (response) {
                //window.location.reload();
                $(".shopping-cart").html(response.cart_component)
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
            }
        });
    })

    $(document).on('click', '.decrement-btn', function(e) {
        e.preventDefault();
        var decre_value = $(this).parents('.quantity').find('.qty-input').val();
        var value = parseInt(decre_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value>1){
            value--;
            $(this).parents('.quantity').find('.qty-input').val(value);
        }
        var product_id = $(this).closest(".cartpage").find('.product_id').val();
        console.log(product_id);
        var data = {
            '_token': $('input[name=_token]').val(),
            'quantity':value,
            'product_id':product_id,
        };

        $.ajax({
            url: '/update-cart',
            type: 'POST',
            data: data,
            success: function (response) {
                //window.location.reload();
                $(".shopping-cart").html(response.cart_component)
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
            }
        });
    })
});

function addToCart()
{
    $('.btn-addtocart').click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var product_id = $("#product_id").val();
        var quantity = $("#quantity").val();
        $.ajax({
            url: "/add-to-cart",
            method: "POST",
            data: {
                'quantity': quantity,
                'product_id': product_id,
            },
            success: function (response) {
                alertify.set('notifier','position', 'bottom-right');
                alertify.success(response.message);
            },
        });
        loadCart();
    });
}

function loadCart()
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/load-cart',
        method: "GET",
        success: function (response) {
            $('#cart').html('');
            var parsed = jQuery.parseJSON(response)
            var value = parsed;
            $('#cart').append($('<i class="fa fa-shopping-cart"></i> '+ value['totalcart']));
        }
    });
}

function plus()
{
    $('.plus').click(function (e) {
        e.preventDefault();
        var incre_value = $(this).parents('.quantity').find('.qty-input').val();
        var value = parseInt(incre_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value<100){
            value++;
            $(this).parents('.quantity').find('.qty-input').val(value);
        }
    });
}

function minus()
{
    $('.minus').click(function (e) {
        e.preventDefault();
        var decre_value = $(this).parents('.quantity').find('.qty-input').val();
        var value = parseInt(decre_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value>1){
            value--;
            $(this).parents('.quantity').find('.qty-input').val(value);
        }
    });
}

function deleteCart()
{
    $('.delete_cart_data').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest(".cartpage").find('.product_id').val();

        var data = {
            '_token': $('input[name=_token]').val(),
            "product_id": product_id,
        };
        $.ajax({
            url: '/delete',
            type: 'post',
            data: data,
            success: function (response) {
                $(".shopping-cart").html(response.cart_component);
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
            }
        });
    });
}

function clearAll()
{
    $(".clear_cart").click(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/clear-all',
            type: post,
            success:function(response)
            {
                // if (response.status == 200) {
                //     window.location.reload();
                // }
            }
        })
    })
}

function buyNow()
{
    $('.buy-now').click(function(e){
      e.preventDefault() ;
      var id = $('#product_id').val();
      var quantity = $('#quantity').val();
      $.ajax({
        type: 'post',
        url: '/buynow',
        data: {
            'quantity': quantity,
            'product_id': id,
        },
        success: function(response) {
          window.location = '/checkout';
        }
      });
    });
}


