$("document").ready(function () {
    //Increment Product Quantity
    $(".qtybuttonInc").click(function (e) {
        e.preventDefault();
        var inc_value = $("#prod_qty").val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $("#prod_qty").val(value);
        }
    });
    //Decrement Product Quantity
    $(".qtybuttonDecr").click(function (e) {
        e.preventDefault();
        var dec_value = $("#prod_qty").val();
        var value = parseInt(dec_value);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $("#prod_qty").val(value);
        }
    });

    $("#add-to-cart").click(function (e) {
        e.preventDefault();
        var prod_id = $("#prod_id").val();

        var prod_qty = $("#prod_qty").val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            url: "/add-to-cart",
            data: {
                prod_id: prod_id,
                prod_qty: prod_qty,
            },
            success: function (response) {
                if (response.success) {
                    swal({
                        title: "Waoh, Great job",
                        text: response.success,
                        icon: "success",
                        button: "View Cart",
                    });
                } else if (response.loginerror) {
                    swal({
                        title: "Opps!,You have Login",
                        text: response.loginerror,
                        icon: "error",
                        button: "Login",
                    });
                } else {
                    swal({
                        title: "Opps!, Already Added",
                        text: response.status,
                        icon: "warning",
                        button: "View Cart",
                    });
                }

                //  response.status;
            },
        });
    });
    // $("#pay-now").click(function (e) {
    //     e.preventDefault();
    //     // alert("Pay now Clcik");
    //     let email = $("email").val();
    //     let amount = $("amount").val();
    //     let currency = $("currency").val();
    //     $.ajaxSetup({
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //         },
    //     });
    //     const data = $.ajax({
    //         type: "POST",
    //         url: "/pay",
    //         data: {
    //             email: email,
    //             amount: amount,
    //             currency: currency,
    //         },
    //         // dataType: "dataType",
    //         success: function (response) {
    //             console.log(response);
    //         },
    //     });
    // });
});
