// Shorthand for $( document ).ready()
$(function () {
    $(document).on("click", "#sign_in", function (e) {
        e.preventDefault();
        // console.log(jQuery('#myForm').attr("method"));
        jQuery(".error_class").html("");
        e.preventDefault();
        jQuery.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),  },  });
        $.ajax({
            type: jQuery('#myForm').attr("method"),
            url: jQuery('#myForm').attr("action"),
            data: jQuery('#myForm').serialize(),
            success: function (response) {
                console.log(response);
                if (response.status == true) {
                    console.log(response);
                }
            },
            error: function (err) {
                console.log(err);
                if (err.status === 400) {
                    $.each(err.responseJSON.errors, function (field_name, value) {
                        var el = $(document).find(`[name="${field_name}"]`);
                        el.after($(`<span style="color: red;" class="error_class">${value}</span>`));                    })

                }else{
                    jQuery(".error_class").html("");
                }
            },
        });
    });
});
