$(document).ready(function() {
    // $("input").on("click", function() {
    //     var value_price = $(".hidden").html($("input:hidden .price").val("value-price"));

    //     console.log(value_price);
    // });

    $(".radio").click(function() {
        var value_price = $("input[name=r-price]:checked").attr("value-price");
        var value_brand = $("input[name=r-brand]:checked").attr("value-brand");
        var value_type = $("input[name=type]:checked").attr("value-type");
        var data = { value_price: value_price, value_brand: value_brand, value_type: value_type };
        console.log(data);
        $.ajax({
            type: "POST",
            url: "?mod=product&action=fillter_product",
            data: data,
            dataType: "text",
            success: function(data) {
                $(".main-content").html(data);
            }
        });
    });
});