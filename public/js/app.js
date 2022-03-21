$(document).ready(function() {
    $(".num-order").change(function() {
        var id = $(this).attr('data-id');
        var qty = $(this).val();
        var data = { id: id, qty: qty };

        $.ajax({
            type: "POST",
            url: "?mod=cart&action=update_ajax",
            data: data,
            dataType: "json",
            success: function(data) {
                $("#sub-total-" + id).text(data.sub_total);
                $("#total-price span").text(data.total);
                $("span#num").text(data.num_order);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
});