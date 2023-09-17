

$(document).ready(function() {

    $(".add-cart").click(function() {
        var producId = $(this).data("pro-id")
        var userId   = $(this).data("user")
        window.alert(userId)
        $.ajax({
            url: "/api/product/cart/"+producId,
            type: "POST",
            dataType: "json",
            data: {
                producId: producId,
                userId: userId
            },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });


});