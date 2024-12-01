@extends('backend/master/master')
@section('title', 'New order')
@section('style')
    <style>
        .section {
            margin-top: 20px;
        }
        #form-search {
            height: 50px;
        }

        .search-container {
            position: relative;
            margin: 20px auto;
        }

        #form-search {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .search-result {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #fff;
            border: 1px solid #ccc;
            border-top: none;
            border-radius: 0 0 5px 5px;
            max-height: 300px;
            overflow-y: auto;
            z-index: 1000;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .search-item {
            padding: 10px;
            border-bottom: 1px solid #f0f0f0;
            cursor: pointer;
            display: flex;
            flex-direction: column;
        }

        .search-item:hover {
            background: #f9f9f9;
        }

        .product-name {
            font-weight: bold;
            color: #333;
        }

        .product-price, .product-code {
            font-size: 14px;
            color: #666;
        }

        .no-result {
            padding: 10px;
            text-align: center;
            color: #999;
        }

        #order-table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        #order-table th, #order-table td {
            padding: 10px;
            text-align: left;
        }

        #order-table th {
            background: #f4f4f4;
            font-weight: bold;
        }

        #order-table tr:nth-child(even) {
            background: #f9f9f9;
        }
        .quantity {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        /* .qty-input {
            margin: 0px 10px;
        } */
    </style>
@endsection
@section('content')

<section class="section">
    <div class="container">
        <div class="row search-prd search-container">
            <div class="col-md-12">
                <input type="text" class="form-control" id="form-search" placeholder="Search product">
            </div>
            <ul class="search-result"></ul>
            
        </div>
        <div class="row">
            <div class="col-md-12">
                @php $total="0" @endphp
                <div class="shopping-cart">
                    <div class="shopping-cart-table">
                        <div class="table-responsive">
                            <table class="table table-bordered my-auto  text-center" id="order-table">
                                <thead>
                                    <tr>
                                        <th class="cart-product-name">Tên sản phẩm</th>
                                        <th class="cart-price">Giá</th>
                                        <th class="cart-qty">Số lượng</th>
                                        <th class="cart-total">Tạm tính</th>
                                        <th class="cart-romove"></th>
                                    </tr>
                                </thead>
                                <tbody class="my-auto cart-items">
                                   
                                </tbody>
                            </table><!-- /table -->
                        </div>
                    </div><!-- /.shopping-cart-table -->
                    <div class="row">

                        <div class="col-md-8 col-sm-12 estimate-ship-tax d-flex" style="padding-left: 130px;padding-top: 50px;">
                            <button type="button" class="btn btn-danger clear_cart" onclick="return confirm('bạn có chắc muốn xóa hết giỏ hàng không?')">xóa giỏ hàng</button>
                        </div><!-- /.estimate-ship-tax -->

                        <div class="col-md-4 col-sm-12 ">
                            <div class="cart-shopping-total">

                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3 class="cart-grand-name">Tổng tiền</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="cart-grand-price">
                                            <span class="cart-grand-price-viewajax">{{ number_format($total, 2) }} VND</span>
                                        </h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="cart-checkout-btn text-center">

                                                <button class="btn btn-success btn-block checkout-btn">Thanh toán</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- /.shopping-cart -->
            </div>
        </div> <!-- /.row -->
    </div><!-- /.container -->
</section>

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let debounceTimer; // Declare a timer variable

        $("#form-search").on("input", function (e) {
            e.preventDefault();
            let search = $(this).val();

            // Clear the previous timer
            clearTimeout(debounceTimer);

            // Set a new timer
            debounceTimer = setTimeout(function () {
                // Only make the AJAX call if the input is not empty
                if (search.trim() !== "") {
                    $.ajax({
                        url: '{{route('product.search')}}',
                        method: 'POST',
                        data: {
                            search: search,
                        },
                        success: function (response) {
                            // Clear previous results
                            $(".search-result").empty();

                            // Check if response contains products
                            if (response.products && response.products.length > 0) {
                                // Loop through each product and append to the search-result element
                                response.products.forEach(function (product) {
                                    $(".search-result").append(`
                                        <li class="search-item" data-name="${product.product_name}" data-price="${product.product_price}" data-id="${product.id}">
                                            <span class="product-name">Name: ${product.product_name}</span>
                                            <span class="product-code">Code: ${product.product_code}</span>
                                            <span class="product-price">Price: ${product.product_price} VND</span>
                                        </li>
                                    `);
                                });
                            } else {
                                $(".search-result").append(`<li>No products found</li>`);
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("Error:", error);
                        }
                    });
                } else {
                    // Clear the results if input is empty
                    $(".search-result").empty();
                }
            }, 500); // Delay the execution by 1 second
        });

        $(document).on("click", ".search-item", function () {
            let name = $(this).data("name");
            let price = $(this).data("price");
            let productId = $(this).data("id");
            let quantity = 1; // Default quantity

            // Check if the product is already in the cart
            let existingProduct = $(`.product_id[value="${productId}"]`).closest(".cartpage");
            if (existingProduct.length > 0) {
                // Update quantity if product already exists
                let qtyInput = existingProduct.find(".qty-input");
                let newQuantity = parseInt(qtyInput.val()) + 1;
                qtyInput.val(newQuantity);

                // Update total price for the product
                let newTotal = newQuantity * price;
                existingProduct.find(".cart-grand-total-price").text(newTotal.toFixed(2));

            } else {
                // Append the product to the cart table
                $(".cart-items").append(`
                    <tr class="cartpage">
                        <td class="cart-product-name-info">
                            <h4 class="cart-product-description">
                                <a href="javascript:void(0)">${name}</a>
                            </h4>
                        </td>
                        <td class="cart-product-sub-total">
                            <span class="cart-sub-total-price">${price.toFixed(2)}</span>
                        </td>
                        <td class="cart-product-quantity" width="130px">
                            <div class="input-group quantity">
                                <button class=" btn btn-warning input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                                    <span class="input-group-text">-</span>
                                </button>
                                <input type="hidden" class="product_id" value="${productId}">
                                <input type="text" class="qty-input form-control" maxlength="2" value="${quantity}" readonly>
                                <button class="btn btn-info input-group-append increment-btn changeQuantity" style="cursor: pointer">
                                    <span class="input-group-text">+</span>
                                </button>
                            </div>
                        </td>
                        <td class="cart-product-grand-total">
                            <span class="cart-grand-total-price">${(quantity * price).toFixed(2)}</span>
                        </td>
                        <td style="font-size: 20px;">
                            <button type="button" class="delete_cart_data btn btn-danger">
                                x
                            </button>
                        </td>
                    </tr>
                `);
            }

            updateCartTotal();

            // Clear the search result and input after selection
            $(".search-result").empty();
            $("#form-search").val(""); // Clear the input
        });

        $(document).on('click', '.increment-btn', function (e) {
            e.preventDefault();
            let quantityInput = $(this).parents('.quantity').find('.qty-input');
            let quantity = parseInt(quantityInput.val(), 10);
            quantity = isNaN(quantity) ? 0 : quantity;
            if (quantity < 100) {
                quantity++;
                quantityInput.val(quantity);

                // Update product total price
                updateProductTotal($(this), quantity);
            }
        });

        $(document).on('click', '.decrement-btn', function (e) {
            e.preventDefault();
            let quantityInput = $(this).parents('.quantity').find('.qty-input');
            let quantity = parseInt(quantityInput.val(), 10);
            quantity = isNaN(quantity) ? 0 : quantity;
            if (quantity > 1) {
                quantity--;
                quantityInput.val(quantity);

                // Update product total price
                updateProductTotal($(this), quantity);
            }
        });

        $(document).on("click", ".delete_cart_data", function () {
            // Remove the product row
            let productRow = $(this).closest(".cartpage");
            productRow.remove();

            // Recalculate the overall cart total after product removal
            updateCartTotal();
        });

        $(".clear_cart").click(function() {
            $('.cart-items').empty();
            updateCartTotal();
        })

        // Function to update the total price of a product and the overall total
        function updateProductTotal(buttonElement, quantity) {
            let productRow = buttonElement.closest('.cartpage');
            let price = parseFloat(productRow.find('.cart-sub-total-price').text());
            let productTotal = price * quantity;

            // Update product total price
            productRow.find('.cart-grand-total-price').text(productTotal.toFixed(2));

            // Update overall cart total
            updateCartTotal();
        }

        // Function to calculate and update the overall total price
        function updateCartTotal() {
            let total = 0;

            $('.cart-grand-total-price').each(function () {
                total += parseFloat($(this).text());
            });

            // Update total price in the cart summary
            $('.cart-grand-price-viewajax').text(total.toFixed(2) + ' VND');
        }

        $(document).on('click', '.checkout-btn', function() {
            // Prepare an array to hold the cart data
            let cartData = [];
            
            // Loop through each cart item to gather product_id and quantity
            $('.cartpage').each(function() {
                let productId = $(this).find('.product_id').val();
                let quantity = $(this).find('.qty-input').val();
                
                // Push the data to the cartData array
                cartData.push({
                    product_id: productId,
                    quantity: quantity
                });
            });
            
            // Make the AJAX request
            $.ajax({
                url: '/admin/order-save', // Replace with your actual endpoint
                method: 'POST',
                data: {
                    cart: cartData // Cart data
                },
                success: function(response) {
                    // Handle success response
                    if (response.success) {
                        alert('Done =))');
                        // Optionally, redirect to a confirmation page
                        window.location.href = '/admin/order-new';
                    } else {
                        alert('Checkout failed. Please try again.');
                    }
                },
                error: function(error) {
                    // Handle error response
                    console.error(error);
                    alert('An error occurred. Please try again.');
                }
            });
        });
    </script>
@endsection
