$(document).ready(function() {
    $(".search_header").keyup(function() {
        var txt = $(this).val();
        var data = { search: txt };
        if (data != "") {
            $.ajax({
                type: "POST",
                url: "?mod=home&action=search_header",
                data: data,
                dataType: "text",
                success: function(data) {
                    $(".main-content").html(data);
                }
            });
        }
    });
});