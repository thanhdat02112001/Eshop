$(document).ready(function() {
    $("#coupon-form").submit( function(e) {
        e.preventDefault();
        let coupon = $("#coupon").val();
        let total = $("#total").val();
        let url = '/apply-coupon'
        console.log(total);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                "coupon": coupon,
                "total": total,
            },
            success: function(response) {
                $("#totalMoney").html('')
                $("#totalMoney").html(response.total+ `VND`)
                $("#total").val(response.total);
                if (response.status == 1) {
                    alertify.set('notifier','position','bottom-right');
                    alertify.success(response.message);
                    $("#coupon").read0nly=true;
                    $("#applyCoupon").hide();
                } else{
                    alertify.set('notifier','position','bottom-right');
                    alertify.error(response.message);
                }
            }
        });
        return false;
    })
})
